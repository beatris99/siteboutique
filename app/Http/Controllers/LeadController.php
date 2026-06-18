<?php

namespace App\Http\Controllers;

use App\Actions\Leads\CreateLeadAction;
use App\Actions\Leads\UpdateLeadStatusAction;
use App\Enums\LeadStatus;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadFollowUpRequest;
use App\Http\Requests\UpdateLeadStatusRequest;
use App\Mail\NewLeadReceivedMail;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Http\Requests\UpdateLeadRequest;
use App\Actions\Leads\CreateLeadSystemNoteAction;
use App\Mail\LeadConfirmationMail;
use Throwable;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $query = $this->applyFilters(Lead::query(), $request);

        if ($request->boolean('follow_up')) {
            $query->orderBy('follow_up_at');
        } else {
            $query->latest();
        }

        $leads = $query
            ->paginate(10)
            ->withQueryString();

        $statuses = LeadStatus::cases();

        $categories = Lead::query()
            ->select('selected_category_key', 'selected_category_label')
            ->whereNotNull('selected_category_key')
            ->distinct()
            ->orderBy('selected_category_label')
            ->get();

        $packages = Lead::query()
            ->select('selected_package_key', 'selected_package_name')
            ->whereNotNull('selected_package_key')
            ->distinct()
            ->orderBy('selected_package_name')
            ->get();

        $stats = [
            'total' => Lead::query()->count(),
            'new' => Lead::query()->where('status', LeadStatus::New->value)->count(),
            'in_discussion' => Lead::query()->where('status', LeadStatus::InDiscussion->value)->count(),
            'follow_up' => Lead::query()->whereNotNull('follow_up_at')->count(),
            'estimated_value' => Lead::query()->sum('total_price'),
        ];

        return view('admin.leads.index', compact(
            'leads',
            'statuses',
            'categories',
            'packages',
            'stats'
        ));
    }

    public function show(Lead $lead): View
    {
        $lead->load('notes');

        $statuses = LeadStatus::cases();

        return view('admin.leads.show', compact('lead', 'statuses'));
    }

    public function store(StoreLeadRequest $request, CreateLeadAction $createLeadAction): JsonResponse
    {
        $lead = $createLeadAction->handle($request->validated());

        try {
            Mail::to(config('admin.email'))->send(new NewLeadReceivedMail($lead));

            if ($lead->email) {
                Mail::to($lead->email)->send(new LeadConfirmationMail($lead));
            }
        } catch (Throwable $exception) {
            Log::error('Lead emails could not be sent.', [
                'lead_id' => $lead->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'message' => 'Cererea a fost trimisă cu succes. Revin cu un mesaj pentru clarificări.',
        ]);
    }

    public function updateStatus(
        UpdateLeadStatusRequest $request,
        Lead $lead,
        UpdateLeadStatusAction $updateLeadStatusAction,
        CreateLeadSystemNoteAction $createLeadSystemNoteAction
    ): RedirectResponse {
        $oldStatus = $lead->status;
        $newStatus = $request->validated('status');

        $updateLeadStatusAction->handle($lead, $newStatus);

        if ($oldStatus !== $newStatus) {
            $createLeadSystemNoteAction->handle(
                $lead,
                "Status schimbat din '{$oldStatus}' în '{$newStatus}'."
            );
        }

        return back()->with('success', 'Statusul cererii a fost actualizat.');
    }

    public function updateFollowUp(
        UpdateLeadFollowUpRequest $request,
        Lead $lead,
        CreateLeadSystemNoteAction $createLeadSystemNoteAction
    ): RedirectResponse {
        $validated = $request->validated();

        $oldFollowUp = $lead->follow_up_at?->format('d.m.Y H:i') ?: 'nesetat';
        $oldPriority = $lead->priority;

        $lead->update([
            'follow_up_at' => $validated['follow_up_at'],
            'priority' => $validated['priority'],
        ]);

        $newFollowUp = $lead->fresh()->follow_up_at?->format('d.m.Y H:i') ?: 'nesetat';
        $newPriority = $validated['priority'];

        $createLeadSystemNoteAction->handle(
            $lead,
            "Follow-up actualizat din '{$oldFollowUp}' în '{$newFollowUp}'. Prioritate: {$oldPriority} → {$newPriority}."
        );

        return back()->with('success', 'Follow-up-ul a fost actualizat.');
    }

    public function export(Request $request): StreamedResponse
    {
        $query = $this->applyFilters(Lead::query(), $request)
            ->with('notes')
            ->latest();

        $fileName = 'sitego-leads-' . now()->format('Y-m-d-H-i') . '.csv';

        return response()->streamDownload(function () use ($query) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID',
                'Nume',
                'Email',
                'Telefon',
                'Status',
                'Categorie',
                'Template',
                'Pachet',
                'Functii extra',
                'Total estimativ',
                'Prioritate',
                'Follow-up',
                'Mesaj',
                'Note interne',
                'Creat la',
            ]);

            $query->chunk(100, function ($leads) use ($handle) {
                foreach ($leads as $lead) {
                    $features = is_array($lead->selected_features)
                        ? $lead->selected_features
                        : json_decode($lead->selected_features ?? '[]', true);

                    $notes = $lead->notes
                        ->map(fn ($note) => $note->created_at?->format('d.m.Y H:i') . ' - ' . $note->body)
                        ->implode("\n");

                    fputcsv($handle, [
                        $lead->id,
                        $lead->name,
                        $lead->email,
                        $lead->phone,
                        $lead->status,
                        $lead->selected_category_label,
                        $lead->selected_template,
                        $lead->selected_package_name,
                        implode(', ', $features ?: []),
                        $lead->total_price,
                        $lead->priority,
                        $lead->follow_up_at?->format('d.m.Y H:i'),
                        $lead->message,
                        $notes,
                        $lead->created_at?->format('d.m.Y H:i'),
                    ]);
                }
            });

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function destroy(Lead $lead): RedirectResponse
    {
        $lead->delete();

        return redirect()
            ->route('admin.leads.index')
            ->with('success', 'Lead-ul a fost șters.');
    }

    private function applyFilters(Builder $query, Request $request): Builder
    {
        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('category')) {
            $query->where('selected_category_key', $request->string('category'));
        }

        if ($request->filled('package')) {
            $query->where('selected_package_key', $request->string('package'));
        }

        if ($request->boolean('follow_up')) {
            $query->whereNotNull('follow_up_at');
        }

        if ($request->filled('search')) {
            $search = '%' . $request->string('search') . '%';

            $query->where(function (Builder $query) use ($search) {
                $query
                    ->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('phone', 'like', $search)
                    ->orWhere('selected_template', 'like', $search)
                    ->orWhere('message', 'like', $search);
            });
        }

        return $query;
    }

    public function edit(Lead $lead): View
    {
        $lead->load('notes');

        $statuses = LeadStatus::cases();

        return view('admin.leads.edit', compact('lead', 'statuses'));
    }

    public function update(
        UpdateLeadRequest $request,
        Lead $lead,
        CreateLeadSystemNoteAction $createLeadSystemNoteAction
    ): RedirectResponse {
        $validated = $request->validated();

        $changes = [];

        foreach ($validated as $key => $value) {
            if ($key === 'selected_features') {
                continue;
            }

            if ((string) $lead->{$key} !== (string) $value) {
                $changes[] = $key;
            }
        }

        $lead->update($validated);

        if (! empty($changes)) {
            $createLeadSystemNoteAction->handle(
                $lead,
                'Lead editat manual. Câmpuri modificate: ' . implode(', ', $changes) . '.'
            );
        }

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'Lead-ul a fost actualizat.');
    }

    public function offer(Lead $lead, LeadOfferBuilder $leadOfferBuilder)
    {
        $lead->load('notes');

        return view('admin.leads.offer', [
            'lead' => $lead,
            'offerText' => $leadOfferBuilder->build($lead),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\Leads\CreateLeadAction;
use App\Actions\Leads\UpdateLeadStatusAction;
use App\Enums\LeadStatus;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadStatusRequest;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Mail\NewLeadReceivedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $query = Lead::query()->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('category')) {
            $query->where('selected_category_key', $request->string('category'));
        }

        if ($request->filled('package')) {
            $query->where('selected_package_key', $request->string('package'));
        }

        if ($request->filled('search')) {
            $search = '%' . $request->string('search') . '%';

            $query->where(function ($query) use ($search) {
                $query
                    ->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('phone', 'like', $search)
                    ->orWhere('selected_template', 'like', $search)
                    ->orWhere('message', 'like', $search);
            });
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
        } catch (\Throwable $exception) {
            Log::error('New lead email could not be sent.', [
                'lead_id' => $lead->id,
                'error' => $exception->getMessage(),
            ]);
        }
        return response()->json([
            'message' => 'Cererea a fost trimisă cu succes.',
            'lead_id' => $lead->id,
        ], 201);
    }

    public function updateStatus(
        UpdateLeadStatusRequest $request,
        Lead $lead,
        UpdateLeadStatusAction $updateLeadStatusAction
    ): RedirectResponse {
        $updateLeadStatusAction->handle($lead, $request->validated('status'));

        return back()->with('success', 'Statusul cererii a fost actualizat.');
    }
}

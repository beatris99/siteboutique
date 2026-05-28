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
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(): View
    {
        $leads = Lead::query()
            ->latest()
            ->get();

        $statuses = LeadStatus::cases();

        return view('admin.leads.index', compact('leads', 'statuses'));
    }

    public function store(StoreLeadRequest $request, CreateLeadAction $createLeadAction): JsonResponse
    {
        $lead = $createLeadAction->handle($request->validated());

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

        return redirect()
            ->route('admin.leads.index')
            ->with('success', 'Statusul cererii a fost actualizat.');
    }
}

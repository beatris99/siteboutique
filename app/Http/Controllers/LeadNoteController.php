<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadNoteRequest;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;

class LeadNoteController extends Controller
{
    public function store(StoreLeadNoteRequest $request, Lead $lead): RedirectResponse
    {
        $lead->notes()->create([
            'body' => $request->validated('body'),
        ]);

        return back()->with('success', 'Nota a fost adăugată.');
    }
}

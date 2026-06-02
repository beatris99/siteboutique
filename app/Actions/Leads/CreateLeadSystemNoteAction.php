<?php

namespace App\Actions\Leads;

use App\Models\Lead;

class CreateLeadSystemNoteAction
{
    public function handle(Lead $lead, string $body): void
    {
        $lead->notes()->create([
            'type' => 'system',
            'body' => $body,
        ]);
    }
}

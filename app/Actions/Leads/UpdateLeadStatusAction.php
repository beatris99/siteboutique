<?php

namespace App\Actions\Leads;

use App\Models\Lead;

class UpdateLeadStatusAction
{
    public function handle(Lead $lead, string $status): Lead
    {
        $lead->update([
            'status' => $status,
        ]);

        return $lead;
    }
}

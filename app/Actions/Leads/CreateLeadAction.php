<?php

namespace App\Actions\Leads;

use App\Models\Lead;

class CreateLeadAction
{
    public function handle(array $data): Lead
    {
        return Lead::create([
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'message' => $data['message'] ?? null,
            'selected_template' => $data['template'],
            'selected_features' => $data['features'] ?? [],
            'total_price' => $data['totalPrice'],
            'status' => 'new',
            'selected_category_key' => $data['categoryKey'] ?? null,
            'selected_category_label' => $data['categoryLabel'] ?? null,
        ]);
    }
}

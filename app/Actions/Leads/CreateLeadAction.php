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

            'request_type' => $data['requestType'] ?? null,
            'site_goal' => $data['siteGoal'] ?? null,

            'business_type' => $data['businessType'] ?? null,
            'has_logo' => $data['hasLogo'] ?? null,
            'has_photos' => $data['hasPhotos'] ?? null,
            'has_domain' => $data['hasDomain'] ?? null,
            'budget_range' => $data['budgetRange'] ?? null,
            'urgency' => $data['urgency'] ?? null,
            'launch_deadline' => $data['launchDeadline'] ?? null,
            'source_page' => $data['sourcePage'] ?? null,

            'selected_template' => $data['template'],
            'selected_category_key' => $data['categoryKey'] ?? null,
            'selected_category_label' => $data['categoryLabel'] ?? null,
            'selected_package_key' => $data['packageKey'] ?? null,
            'selected_package_name' => $data['packageName'] ?? null,
            'selected_features' => $data['features'] ?? [],

            'total_price' => $data['totalPrice'] ?? 0,
            'message' => $data['message'] ?? null,
            'status' => 'new',
            'priority' => 'normal',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Enums\LeadStatus;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function __invoke(): View
    {
        $statuses = LeadStatus::cases();

        $stats = [
            'total' => Lead::query()->count(),
            'new' => Lead::query()->where('status', LeadStatus::New->value)->count(),
            'contacted' => Lead::query()->where('status', LeadStatus::Contacted->value)->count(),
            'in_discussion' => Lead::query()->where('status', LeadStatus::InDiscussion->value)->count(),
            'won' => Lead::query()->where('status', LeadStatus::Won->value)->count(),
            'lost' => Lead::query()->where('status', LeadStatus::Lost->value)->count(),
            'follow_up' => Lead::query()->whereNotNull('follow_up_at')->count(),
            'estimated_value' => Lead::query()->sum('total_price'),
            'won_value' => Lead::query()
                ->where('status', LeadStatus::Won->value)
                ->sum('total_price'),
        ];

        $latestLeads = Lead::query()
            ->latest()
            ->take(6)
            ->get();

        $followUpLeads = Lead::query()
            ->whereNotNull('follow_up_at')
            ->orderBy('follow_up_at')
            ->take(6)
            ->get();

        $statusSummaries = collect($statuses)
            ->map(function (LeadStatus $status) {
                return [
                    'value' => $status->value,
                    'label' => $status->label(),
                    'count' => Lead::query()
                        ->where('status', $status->value)
                        ->count(),
                    'total' => Lead::query()
                        ->where('status', $status->value)
                        ->sum('total_price'),
                ];
            });

        return view('admin.dashboard', compact(
            'stats',
            'latestLeads',
            'followUpLeads',
            'statusSummaries'
        ));
    }
}

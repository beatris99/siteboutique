<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'vehiclesCount' => Vehicle::count(),
            'availableVehiclesCount' => Vehicle::where('is_available', true)->count(),
            'contactRequestsCount' => ContactRequest::count(),
            'latestRequests' => ContactRequest::latest()->take(5)->get(),
        ]);
    }
}

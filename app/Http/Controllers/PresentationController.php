<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

class PresentationController extends Controller
{
    public function home()
    {
        $vehicles = Vehicle::query()
            ->with(['images', 'activeRentalPlans'])
            ->where('is_active', true)
            ->where('is_available', true)
            ->latest()
            ->take(6)
            ->get();

        $funVehicles = Vehicle::query()
            ->with(['images', 'funRentalPlans'])
            ->where('is_active', true)
            ->where('is_available', true)
            ->whereIn('use_case', ['fun', 'both'])
            ->latest()
            ->get();

        $deliveryVehicles = Vehicle::query()
            ->with(['images', 'deliveryRentalPlans'])
            ->where('is_active', true)
            ->where('is_available', true)
            ->whereIn('use_case', ['delivery', 'both'])
            ->latest()
            ->get();

        return view('presentation.home', compact('vehicles', 'funVehicles', 'deliveryVehicles'));
    }

    public function offers()
    {
        $vehicles = Vehicle::query()
            ->with(['images', 'activeRentalPlans'])
            ->where('is_active', true)
            ->where('is_available', true)
            ->latest()
            ->get();

        return view('presentation.offers', compact('vehicles'));
    }

    public function cityRides()
    {
        $vehicles = Vehicle::query()
            ->with(['images', 'activeRentalPlans', 'funRentalPlans'])
            ->where('is_active', true)
            ->where('is_available', true)
            ->whereIn('use_case', ['fun', 'both'])
            ->latest()
            ->get();

        return view('presentation.city-rides', compact('vehicles'));
    }

    public function delivery()
    {
        $vehicles = Vehicle::query()
            ->with(['images', 'activeRentalPlans', 'deliveryRentalPlans'])
            ->where('is_active', true)
            ->where('is_available', true)
            ->whereIn('use_case', ['delivery', 'both'])
            ->latest()
            ->get();

        return view('presentation.delivery', compact('vehicles'));
    }

    public function vehicle(string $slug)
    {
        $vehicle = Vehicle::query()
            ->with(['images', 'activeRentalPlans'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->where('is_available', true)
            ->firstOrFail();

        return view('presentation.vehicle', compact('vehicle'));
    }

    public function contact()
    {
        return view('presentation.contact');
    }

    public function rentRideBrasov()
    {
        $vehicles = Vehicle::query()
            ->with(['images', 'activeRentalPlans'])
            ->where('is_active', true)
            ->where('is_available', true)
            ->latest()
            ->take(6)
            ->get();

        return view('presentation.seo-scooter-rental', compact('vehicles'));
    }

    public function terms()
    {
        return view('presentation.legal.terms');
    }

    public function privacy()
    {
        return view('presentation.legal.privacy');
    }

    public function cookies()
    {
        return view('presentation.legal.cookies');
    }
}

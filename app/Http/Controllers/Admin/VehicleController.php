<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehicleRequest;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with(['images', 'rentalPlans'])->latest()->paginate(20);

        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $vehicle = new Vehicle([
            'type' => 'scooter',
            'use_case' => 'both',
            'weekly_price' => 300,
            'is_available' => true,
            'is_active' => true,
        ]);

        $defaultRentalPlans = collect([
            [
                'title' => '4 ore',
                'label' => 'Plimbare scurtă',
                'use_case' => 'fun',
                'duration_unit' => 'hour',
                'duration_value' => 4,
                'price' => null,
                'price_note' => 'de stabilit',
                'description' => 'Potrivit pentru o tură scurtă prin oraș.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => '1 zi întreagă',
                'label' => 'Zi completă',
                'use_case' => 'fun',
                'duration_unit' => 'day',
                'duration_value' => 1,
                'price' => null,
                'price_note' => 'de stabilit',
                'description' => 'Ideal pentru turiști sau pentru o zi relaxată de explorat Brașovul.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => '1 săptămână',
                'label' => 'Ofertă săptămânală',
                'use_case' => 'both',
                'duration_unit' => 'week',
                'duration_value' => 1,
                'price' => 300,
                'price_note' => null,
                'description' => 'Potrivit pentru mai multe zile sau pentru activitate de livrare.',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ]);

        return view('admin.vehicles.create', compact('vehicle', 'defaultRentalPlans'));
    }

    public function store(VehicleRequest $request)
    {
        $data = $request->vehicleData();
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        $vehicle = Vehicle::create($data);

        $this->syncRentalPlans($request, $vehicle);
        $this->storeImages($request, $vehicle);

        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', __('site.admin.vehicles.created'));
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicle->load(['images', 'rentalPlans']);

        $defaultRentalPlans = collect();

        return view('admin.vehicles.edit', compact('vehicle', 'defaultRentalPlans'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $data = $request->vehicleData();
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        $vehicle->update($data);

        $this->syncRentalPlans($request, $vehicle);
        $this->removeImages($request, $vehicle);
        $this->storeImages($request, $vehicle);

        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', __('site.admin.vehicles.updated'));
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->load('images');

        foreach ($vehicle->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $vehicle->delete();

        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', __('site.admin.vehicles.deleted'));
    }

    private function syncRentalPlans(VehicleRequest $request, Vehicle $vehicle): void
    {
        $plans = $request->rentalPlansData();
        $keptIds = [];

        foreach ($plans as $planData) {
            $planId = $planData['id'] ?? null;
            unset($planData['id']);

            if ($planId) {
                $plan = $vehicle->rentalPlans()->whereKey($planId)->first();

                if (! $plan) {
                    continue;
                }

                $plan->update($planData);
                $keptIds[] = $plan->id;

                continue;
            }

            $plan = $vehicle->rentalPlans()->create($planData);
            $keptIds[] = $plan->id;
        }

        $vehicle->rentalPlans()
            ->when(! empty($keptIds), fn ($query) => $query->whereNotIn('id', $keptIds))
            ->delete();
    }

    private function storeImages(Request $request, Vehicle $vehicle): void
    {
        if (! $request->hasFile('images')) {
            return;
        }

        $nextSortOrder = (int) $vehicle->images()->max('sort_order') + 1;

        foreach ($request->file('images') as $file) {
            $path = $file->store('vehicles', 'public');

            $vehicle->images()->create([
                'image_path' => $path,
                'sort_order' => $nextSortOrder++,
            ]);
        }
    }

    private function removeImages(Request $request, Vehicle $vehicle): void
    {
        $ids = $request->input('remove_images', []);

        if (empty($ids)) {
            return;
        }

        $images = VehicleImage::where('vehicle_id', $vehicle->id)
            ->whereIn('id', $ids)
            ->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }
    }
}

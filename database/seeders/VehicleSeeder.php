<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $vehicles = [
            [
                'name' => 'SYM XPro 50cc',
                'slug' => 'sym-xpro-50cc',
                'type' => 'scooter',
                'use_case' => 'both',
                'brand' => 'SYM',
                'model' => 'XPro 50cc',
                'weekly_price' => 300,
                'deposit' => null,
                'fuel_type' => 'Benzină',
                'license_required' => 'Permis categoria AM / B, în funcție de configurare',
                'short_description' => 'Scuter economic, potrivit pentru oraș și activitate de livrare.',
                'description' => 'SYM XPro 50cc este un scuter practic și economic, potrivit pentru deplasări urbane, plimbări scurte prin Brașov sau activitate de livrare. Este ușor de manevrat și are costuri reduse de utilizare.',
                'is_available' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Beeline Pista 50cc',
                'slug' => 'beeline-pista-50cc',
                'type' => 'scooter',
                'use_case' => 'both',
                'brand' => 'Beeline',
                'model' => 'Pista 50cc',
                'weekly_price' => 300,
                'deposit' => null,
                'fuel_type' => 'Benzină',
                'license_required' => 'Permis categoria AM / B, în funcție de configurare',
                'short_description' => 'Scuter compact, potrivit pentru deplasări rapide prin oraș.',
                'description' => 'Beeline Pista 50cc este o variantă practică pentru Brașov, potrivită pentru plimbări urbane, drumuri scurte sau activitate de livrare. Este o opțiune bună pentru cei care vor mobilitate fără să cumpere un vehicul propriu.',
                'is_available' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Bicicletă electrică City Ride',
                'slug' => 'bicicleta-electrica-city-ride',
                'type' => 'electric_bike',
                'use_case' => 'fun',
                'brand' => 'RentRide',
                'model' => 'City Ride',
                'weekly_price' => 200,
                'deposit' => null,
                'fuel_type' => 'Electric',
                'license_required' => 'Nu necesită permis',
                'short_description' => 'Bicicletă electrică potrivită pentru plimbări relaxate prin Brașov.',
                'description' => 'Bicicleta electrică City Ride este gândită pentru plimbări relaxate prin Brașov, pentru turiști sau localnici care vor să exploreze orașul într-un mod simplu și plăcut.',
                'is_available' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Bicicletă electrică Delivery',
                'slug' => 'bicicleta-electrica-delivery',
                'type' => 'electric_bike',
                'use_case' => 'delivery',
                'brand' => 'RentRide',
                'model' => 'Delivery',
                'weekly_price' => 200,
                'deposit' => null,
                'fuel_type' => 'Electric',
                'license_required' => 'Nu necesită permis',
                'short_description' => 'Bicicletă electrică potrivită pentru livrări și deplasări eficiente.',
                'description' => 'Bicicleta electrică Delivery este o variantă practică pentru cei care vor costuri reduse și mobilitate bună în oraș. Este potrivită pentru livrări, drumuri dese și activitate urbană zilnică.',
                'is_available' => true,
                'is_active' => true,
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::updateOrCreate(
                ['slug' => $vehicle['slug']],
                $vehicle
            );
        }
    }
}

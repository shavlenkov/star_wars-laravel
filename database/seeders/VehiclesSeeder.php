<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://swapi.dev/api/vehicles?page=1';

        for(;;) {

            $data = Http::get($url);
            $results = $data['results'];

            for ($i = 0; $i < count($results); $i++) {
                $vehicle = Vehicle::create([
                    'name' => $results[$i]['name'],
                    'model' => $results[$i]['model'],
                    'manufacturer' => $results[$i]['manufacturer'],
                    'cost_in_credits' => $results[$i]['cost_in_credits'],
                    'length' => $results[$i]['length'],
                    'max_atmosphering_speed' => $results[$i]['max_atmosphering_speed'],
                    'crew' => $results[$i]['crew'],
                    'passengers' => $results[$i]['passengers'],
                    'cargo_capacity' => $results[$i]['cargo_capacity'],
                    'consumables' => $results[$i]['consumables'],
                    'vehicle_class' => $results[$i]['vehicle_class'],
                ]);
            }


            if($data['next'] == null) {
                break;
            }

            $url = $data['next'];
        }
    }
}

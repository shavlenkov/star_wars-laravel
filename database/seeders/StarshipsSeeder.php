<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Starship;
use Illuminate\Support\Facades\Http;

class StarshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://swapi.dev/api/starships?page=1';

        for(;;) {

            $data = Http::get($url);
            $results = $data['results'];

            for ($i = 0; $i < count($results); $i++) {
                $starship = Starship::create([
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
                    'hyperdrive_rating' => $results[$i]['hyperdrive_rating'],
                    'MGLT' => $results[$i]['MGLT'],
                    'starship_class' => $results[$i]['starship_class'],
                ]);
            }


            if($data['next'] == null) {
                break;
            }

            $url = $data['next'];
        }
    }
}

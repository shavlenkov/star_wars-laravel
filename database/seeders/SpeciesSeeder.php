<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Http;
use App\Models\Specie;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://swapi.dev/api/species?page=1';

        for(;;) {

            $data = Http::get($url);
            $results = $data['results'];

            for ($i = 0; $i < count($results); $i++) {
                $specie = Specie::create([
                    'name' => $results[$i]['name'],
                    'classification' => $results[$i]['classification'],
                    'average_height' => $results[$i]['average_height'],
                    'skin_colors' => $results[$i]['skin_colors'],
                    'hair_colors' => $results[$i]['hair_colors'],
                    'eye_colors' => $results[$i]['eye_colors'],
                    'average_lifespan' => $results[$i]['average_lifespan'],
                    'language' => $results[$i]['language'],
                ]);
            }


            if($data['next'] == null) {
                break;
            }

            $url = $data['next'];
        }
    }
}

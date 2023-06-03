<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Http;
use App\Models\Planet;

class PlanetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://swapi.dev/api/planets?page=1';

        for(;;) {

            $data = Http::get($url);
            $results = $data['results'];

            for ($i = 0; $i < count($results); $i++) {
                $films = [];

                for($j = 0; $j < count($results[$i]['films']); $j++) {
                    $films[$j] = Http::get($results[$i]['films'][$j])['title'];
                }

                $films2 = Film::whereIn('title', $films)->get();

                $planet = Planet::create([
                    'name' => $results[$i]['name'],
                    'rotation_period' => $results[$i]['rotation_period'],
                    'orbital_period' => $results[$i]['orbital_period'],
                    'diameter' => $results[$i]['diameter'],
                    'climate' => $results[$i]['climate'],
                    'gravity' => $results[$i]['gravity'],
                    'terrain' => $results[$i]['terrain'],
                    'surface_water' => $results[$i]['surface_water'],
                    'population' => $results[$i]['population'],
                ]);

                $planet->films()->attach($films2);
            }


            if($data['next'] == null) {
                break;
            }

            $url = $data['next'];
        }
    }
}

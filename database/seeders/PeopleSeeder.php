<?php

namespace Database\Seeders;

use App\Models\Starship;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\People;
use App\Models\Planet;
use App\Models\Film;
use App\Models\Specie;

use Illuminate\Support\Facades\Http;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://swapi.dev/api/people?page=1';

        for(;;) {

            $data = Http::get($url);
            $results = $data['results'];

            for ($i = 0; $i < count($results); $i++) {

                $films = [];

                for($j = 0; $j < count($results[$i]['films']); $j++) {
                    $films[$j] = Http::get($results[$i]['films'][$j])['title'];
                }

                $films2 = Film::whereIn('title', $films)->get();

                $species = [];

                for($j = 0; $j < count($results[$i]['species']); $j++) {
                    $species[$j] = Http::get($results[$i]['species'][$j])['name'];
                }

                $species2 = Specie::whereIn('name', $species)->get();

                $starships = [];

                for($j = 0; $j < count($results[$i]['starships']); $j++) {
                    $starships[$j] = Http::get($results[$i]['starships'][$j])['name'];
                }

                $starships2 = Starship::whereIn('name', $starships)->get();

                $vehicles = [];

                for($j = 0; $j < count($results[$i]['vehicles']); $j++) {
                    $vehicles[$j] = Http::get($results[$i]['vehicles'][$j])['name'];
                }

                $vehicles2 = Vehicle::whereIn('name', $vehicles)->get();

                $homeworld = Http::get($results[$i]['homeworld'])['name'];

                $people = People::create([
                    'name' => $results[$i]['name'],
                    'height' => $results[$i]['height'],
                    'mass' => $results[$i]['mass'],
                    'hair_color' => $results[$i]['hair_color'],
                    'eye_color' => $results[$i]['eye_color'],
                    'skin_color' => $results[$i]['skin_color'],
                    'birth_year' => $results[$i]['birth_year'],
                    'gender' => $results[$i]['gender'],
                    'planet_id' => Planet::where('name', '=', $homeworld)->first()->id
                ]);

                $people->films()->attach($films2);
                $people->species()->attach($species2);
                $people->starships()->attach($starships2);
                $people->vehicles()->attach($vehicles2);
            }


            if($data['next'] == null) {
                break;
            }

            $url = $data['next'];
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Http;

use App\Models\Film;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://swapi.dev/api/films?page=1';

        for(;;) {

            $data = Http::get($url);
            $results = $data['results'];

            for ($i = 0; $i < count($results); $i++) {

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

                $film = Film::create([
                    'title' => $results[$i]['title'],
                    'episode_id' => $results[$i]['episode_id'],
                    'opening_crawl' => $results[$i]['opening_crawl'],
                    'director' => $results[$i]['director'],
                    'producer' => $results[$i]['producer'],
                    'release_date' => $results[$i]['release_date'],
                ]);

                $film->species()->attach($species2);
                $film->starships()->attach($starships2);
                $film->vehicles()->attach($vehicles2);
            }


            if($data['next'] == null) {
                break;
            }

            $url = $data['next'];
        }
    }
}

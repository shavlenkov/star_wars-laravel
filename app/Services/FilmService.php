<?php

namespace App\Services;

use App\Models\Film;
use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;

class FilmService
{
    public function paginate(int $a) {
        return Film::simplePaginate($a);
    }

    public function create(array $data) {
        $species = Specie::whereIn('name', $data['species'])->get();
        $starships = Starship::whereIn('name', $data['starships'])->get();
        $vehicles = Vehicle::whereIn('name', $data['vehicles'])->get();

        $film = Film::create([
            'title' => $data['title'],
            'episode_id' => $data['episode_id'],
            'opening_crawl' => $data['opening_crawl'],
            'director' => $data['director'],
            'producer' => $data['producer'],
            'release_date' => $data['release_date']
        ]);

        $film->species()->attach($species);
        $film->starships()->attach($starships);
        $film->vehicles()->attach($vehicles);
    }

    public function edit(Film $film, array $data) {

        $species = Specie::whereIn('name', $data['species'])->get();
        $starships = Starship::whereIn('name', $data['starships'])->get();
        $vehicles = Vehicle::whereIn('name', $data['vehicles'])->get();

        $film->title = $data['title'];
        $film->episode_id = $data['episode_id'];
        $film->opening_crawl = $data['opening_crawl'];
        $film->director = $data['director'];
        $film->producer = $data['producer'];
        $film->release_date = $data['release_date'];

        $film->save();

        $film->species()->attach($species);
        $film->starships()->attach($starships);
        $film->vehicles()->attach($vehicles);
    }

    public function delete(Film $film) {
        $film->delete();
    }


}

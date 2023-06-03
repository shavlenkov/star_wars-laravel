<?php

namespace App\Http\Controllers;

use App\Models\Film;

use App\Http\Requests\StoreUpdateFilmRequest;

use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.films.index')->with('tenFilms', Film::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('swapi.films.create')->with([
            'species' => Specie::all(),
            'starships' => Starship::all(),
            'vehicles' => Vehicle::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateFilmRequest $request)
    {
        $species = Specie::whereIn('name', $request->species)->get();
        $starships = Starship::whereIn('name', $request->starships)->get();
        $vehicles = Vehicle::whereIn('name', $request->vehicles)->get();

        $film = Film::create([
            'title' => $request->title,
            'episode_id' => $request->episode_id,
            'opening_crawl' => $request->opening_crawl,
            'director' => $request->director,
            'producer' => $request->producer,
            'release_date' => $request->release_date
        ]);

        $film->species()->attach($species);
        $film->starships()->attach($starships);
        $film->vehicles()->attach($vehicles);

        return redirect(route('films.index'))->with(['message' => 'Film has been successfully created', 'class' => 'alert-success']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('swapi.films.show')->with('film', $film);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return view('swapi.films.edit')->with([
            'species' => Specie::all(),
            'starships' => Starship::all(),
            'vehicles' => Vehicle::all(),
            'film' => $film
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $species = Specie::whereIn('name', $request->species)->get();
        $starships = Starship::whereIn('name', $request->starships)->get();
        $vehicles = Vehicle::whereIn('name', $request->vehicles)->get();

        $film->title = $request->title;
        $film->episode_id = $request->episode_id;
        $film->opening_crawl = $request->opening_crawl;
        $film->director = $request->director;
        $film->producer = $request->producer;
        $film->release_date = $request->release_date;

        $film->save();

        $film->species()->attach($species);
        $film->starships()->attach($starships);
        $film->vehicles()->attach($vehicles);

        return redirect(route('films.index'))
            ->with(['message' => 'Film has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect(route('films.index'))
            ->with(['message' => 'Film has been successfully deleted', 'class' => 'alert-success']);
    }
}

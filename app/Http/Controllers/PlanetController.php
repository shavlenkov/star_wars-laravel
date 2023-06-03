<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlanetRequest;

use App\Models\Planet;
use App\Models\Film;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.planets.index')->with('tenPlanets', Planet::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('swapi.planets.create')->with([
            'films' => Film::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePlanetRequest $request)
    {
        $films = Film::whereIn('title', $request->films)->get();

        $planet = Planet::create([
            'name' => $request->name,
            'rotation_period' => $request->rotation_period,
            'orbital_period' => $request->orbital_period,
            'diameter' => $request->diameter,
            'climate' => $request->climate,
            'gravity' => $request->gravity,
            'terrain' => $request->terrain,
            'surface_water' => $request->surface_water,
            'population' => $request->population,
        ]);

        $planet->films()->attach($films);

        return redirect(route('planets.index'))->with(['message' => 'Planet has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet)
    {
        return view('swapi.planets.show')->with('planet', $planet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        return view('swapi.planets.edit')->with([
            'films' => Film::all(),
            'planet' => $planet
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planet $planet)
    {
        $films = Film::whereIn('title', $request->films)->get();

        $planet->name = $request->name;
        $planet->rotation_period = $request->rotation_period;
        $planet->orbital_period = $request->orbital_period;
        $planet->diameter = $request->diameter;
        $planet->climate = $request->climate;
        $planet->gravity = $request->gravity;
        $planet->terrain = $request->terrain;
        $planet->surface_water = $request->surface_water;
        $planet->population = $request->population;
        $planet->save();

        $planet->films()->attach($films);

        return redirect(route('planets.index'))
            ->with(['message' => 'Planet has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        $planet->delete();

        return redirect(route('planets.index'))
            ->with(['message' => 'Planet has been successfully deleted', 'class' => 'alert-success']);
    }
}

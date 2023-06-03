<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStarshipRequest;
use App\Models\Starship;


class StarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.starships.index')->with('tenStarships', Starship::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('swapi.starships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateStarshipRequest $request)
    {
        $starship = Starship::create([
            'name' => $request->name,
            'model' => $request->model,
            'manufacturer' => $request->manufacturer,
            'cost_in_credits' => $request->cost_in_credits,
            'length' => $request->length,
            'max_atmosphering_speed' => $request->max_atmosphering_speed,
            'crew' => $request->crew,
            'passengers' => $request->passengers,
            'cargo_capacity' => $request->cargo_capacity,
            'consumables' => $request->consumables,
            'hyperdrive_rating' => $request->hyperdrive_rating,
            'MGLT' => $request->MGLT,
            'starship_class' => $request->starship_class
        ]);

        return redirect(route('starships.index'))->with(['message' => 'Starship has been successfully created', 'class' => 'alert-success']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Starship $starship)
    {
        return view('swapi.starships.show')->with('starship', $starship);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Starship $starship)
    {
        return view('swapi.starships.edit')->with(['starship' => $starship]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Starship $starship)
    {
        $starship->name = $request->name;
        $starship->model = $request->model;
        $starship->manufacturer = $request->manufacturer;
        $starship->cost_in_credits = $request->cost_in_credits;
        $starship->length = $request->length;
        $starship->max_atmosphering_speed = $request->max_atmosphering_speed;
        $starship->crew = $request->crew;
        $starship->passengers = $request->passengers;
        $starship->cargo_capacity = $request->cargo_capacity;
        $starship->consumables = $request->consumables;
        $starship->hyperdrive_rating = $request->hyperdrive_rating;
        $starship->MGLT = $request->MGLT;
        $starship->starship_class = $request->starship_class;

        $starship->save();

        return redirect(route('starships.index'))
            ->with(['message' => 'Starship has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Starship $starship)
    {
        $starship->delete();

        return redirect(route('starships.index'))
            ->with(['message' => 'Starship has been successfully deleted', 'class' => 'alert-success']);
    }
}

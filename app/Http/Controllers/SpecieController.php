<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use App\Http\Requests\StoreUpdateSpecieRequest;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.species.index')->with('tenSpecies', Specie::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('swapi.species.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSpecieRequest $request)
    {
        $species = Specie::create([
            'name' => $request->name,
            'classification' => $request->classification,
            'average_height' => $request->average_height,
            'skin_colors' => $request->skin_colors,
            'hair_colors' => $request->hair_colors,
            'eye_colors' => $request->eye_colors,
            'average_lifespan' => $request->average_lifespan,
            'language' => $request->language
        ]);

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Specie $specie)
    {
        return view('swapi.species.show')->with('specie', $specie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specie $specie)
    {
        return view('swapi.species.edit')->with(['specie' => $specie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specie $specie)
    {
        $specie->name = $request->name;
        $specie->classification = $request->classification;
        $specie->average_height = $request->average_height;
        $specie->skin_colors = $request->skin_colors;
        $specie->hair_colors = $request->hair_colors;
        $specie->eye_colors = $request->eye_colors;
        $specie->average_lifespan = $request->average_lifespan;
        $specie->language = $request->language;

        $specie->save();

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specie $specie)
    {
        $specie->delete();

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully deleted', 'class' => 'alert-success']);
    }
}

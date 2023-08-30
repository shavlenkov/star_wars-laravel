<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStarshipRequest;
use App\Models\Starship;
use App\Services\StarshipService;


class StarshipController extends Controller
{


    public function __construct(StarshipService $starshipService)
    {
        $this->starshipService = $starshipService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $starships = $this->starshipService->paginate(10);

        return view('swapi.starships.index')->with('tenStarships', $starships);
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
        $this->starshipService->create($request->all());

        return redirect(route('starships.index'))->with(['message' => 'Starship has been successfully created', 'class' => 'alert-success']);;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('swapi.starships.show')->with('starship', $this->starshipService->find($id));
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
    public function update(StoreUpdateStarshipRequest $request, $id)
    {
        $this->starshipService->edit($id, $request->all());

        return redirect(route('starships.index'))
            ->with(['message' => 'Starship has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->starshipService->delete($id);

        return redirect(route('starships.index'))
            ->with(['message' => 'Starship has been successfully deleted', 'class' => 'alert-success']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlanetRequest;

use App\Models\Planet;
use App\Models\Film;
use App\Services\PlanetService;

class PlanetController extends Controller
{

    /**
     * @var PlanetService  $planetService
     */
    private PlanetService $planetService;

    /**
     * PlanetController constructor
     *
     * @param PlanetService $planetService
     */
    public function __construct(PlanetService $planetService)
    {
        $this->planetService = $planetService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planet = $this->planetService->paginate(10);

        return view('swapi.planets.index')->with('tenPlanets', $planet);
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
        $this->planetService->create($request->all());

        return redirect(route('planets.index'))->with(['message' => 'Planet has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('swapi.planets.show')->with('planet', $this->planetService->find($id));
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
    public function update(StoreUpdatePlanetRequest $request, $id)
    {

        $this->planetService->edit($id, $request->all());

        return redirect(route('planets.index'))
            ->with(['message' => 'Planet has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->planetService->delete($id);

        return redirect(route('planets.index'))
            ->with(['message' => 'Planet has been successfully deleted', 'class' => 'alert-success']);
    }
}

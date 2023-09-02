<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlanetRequest;

use App\Models\Planet;
use App\Services\PlanetService;

class PlanetController extends Controller
{

    /**
     * PlanetController constructor
     *
     * @param PlanetService $planetService
     */
    public function __construct(private PlanetService $planetService)
    {
        $this->authorizeResource(Planet::class, 'planet');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.planets.index')->with('tenPlanets', $this->planetService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('swapi.planets.create');
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
    public function edit($id)
    {
        return view('swapi.planets.edit')->with('planet', $this->planetService->find($id));
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlanetRequest;

use App\Models\Planet;
use App\Services\PlanetService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
    public function index(): View
    {
        return view('swapi.planets.index')->with('tenPlanets', $this->planetService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('swapi.planets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePlanetRequest $request): RedirectResponse
    {
        $this->planetService->create($request->all());

        return redirect(route('planets.index'))->with(['message' => 'Planet has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet): View
    {
        return view('swapi.planets.show')->with('planet', $planet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet): View
    {
        return view('swapi.planets.edit')->with('planet', $planet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePlanetRequest $request, Planet $planet): RedirectResponse
    {

        $this->planetService->edit($planet, $request->all());

        return redirect(route('planets.index'))
            ->with(['message' => 'Planet has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet): RedirectResponse
    {
        $this->planetService->delete($planet);

        return redirect(route('planets.index'))
            ->with(['message' => 'Planet has been successfully deleted', 'class' => 'alert-success']);
    }
}

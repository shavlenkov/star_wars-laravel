<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStarshipRequest;
use App\Models\Starship;
use App\Services\StarshipService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class StarshipController extends Controller
{

    public function __construct(private StarshipService $starshipService)
    {
        $this->authorizeResource(Starship::class, 'starship');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('swapi.starships.index')->with('tenStarships', $this->starshipService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('swapi.starships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateStarshipRequest $request): RedirectResponse
    {
        $this->starshipService->create($request->all());

        return redirect(route('starships.index'))->with(['message' => 'Starship has been successfully created', 'class' => 'alert-success']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Starship $starship): View
    {
        return view('swapi.starships.show')->with('starship', $starship);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Starship $starship): View
    {
        return view('swapi.starships.edit')->with('starship', $starship);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateStarshipRequest $request, Starship $starship): RedirectResponse
    {
        $this->starshipService->edit($starship, $request->all());

        return redirect(route('starships.index'))
            ->with(['message' => 'Starship has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Starship $starship): RedirectResponse
    {
        $this->starshipService->delete($starship);

        return redirect(route('starships.index'))
            ->with(['message' => 'Starship has been successfully deleted', 'class' => 'alert-success']);
    }
}

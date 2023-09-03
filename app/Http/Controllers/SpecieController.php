<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use App\Http\Requests\StoreUpdateSpecieRequest;
use App\Services\SpecieService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SpecieController extends Controller
{

    /**
     * @param SpecieService $specieService
     */
    public function __construct(private SpecieService $specieService)
    {
        $this->authorizeResource(Specie::class, 'specie');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('swapi.species.index')->with('tenSpecies',  $this->specieService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('swapi.species.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSpecieRequest $request): RedirectResponse
    {
        $this->specieService->create($request->all());

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Specie $specie): View
    {
        return view('swapi.species.show')->with('specie', $specie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specie $specie): View
    {
        return view('swapi.species.edit')->with('specie', $specie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSpecieRequest $request, Specie $specie): RedirectResponse
    {
        $this->specieService->edit($specie, $request->all());

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specie $specie): RedirectResponse
    {
        $this->specieService->delete($specie);

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully deleted', 'class' => 'alert-success']);
    }
}

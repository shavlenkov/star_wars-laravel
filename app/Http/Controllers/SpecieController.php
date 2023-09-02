<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use App\Http\Requests\StoreUpdateSpecieRequest;
use App\Services\SpecieService;

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
    public function index()
    {
        return view('swapi.species.index')->with('tenSpecies',  $this->specieService->paginate(config('app.paginate')));
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
        $this->specieService->create($request->all());

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('swapi.species.show')->with('specie', $this->specieService->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('swapi.species.edit')->with('specie', $this->specieService->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSpecieRequest $request, $id)
    {
        $this->specieService->edit($id, $request->all());

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->specieService->delete($id);

        return redirect(route('species.index'))
            ->with(['message' => 'Specie has been successfully deleted', 'class' => 'alert-success']);
    }
}

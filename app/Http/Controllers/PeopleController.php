<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePeopleRequest;

use App\Models\People;
use App\Models\Planet;
use App\Models\Film;
use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;

use App\Models\Image;

use App\Services\PeopleService;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    /**
     * @var PeopleService $peopleService
     */
    private PeopleService $peopleService;

    /**
     * PeopleController constructor
     *
     * @param PeopleService $peopleService
     */
    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = $this->peopleService->paginate(10);

        return view('swapi.people.index')->with('tenPeople', $people);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('create', People::class);

        return view('swapi.people.create')->with([
            'planets' => Planet::all(),
            'films' => Film::all(),
            'species' => Specie::all(),
            'starships' => Starship::all(),
            'vehicles' => Vehicle::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePeopleRequest $request)
    {

        $this->authorize('create', People::class);

        $this->peopleService->create($request->all());

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('swapi.people.show')->with('people', $this->peopleService->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(People $person)
    {
        return view('swapi.people.edit')->with([
            'planets' => Planet::all(),
            'films' => Film::all(),
            'species' => Specie::all(),
            'starships' => Starship::all(),
            'vehicles' => Vehicle::all(),
            'people' => $person
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePeopleRequest $request, $id)
    {

        $this->peopleService->edit($id, $request->all());

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully updated', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->peopleService->delete($id);

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully deleted', 'class' => 'alert-success']);
    }
}

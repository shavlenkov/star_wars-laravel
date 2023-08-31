<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePeopleRequest;

use App\Models\People;

use App\Services\PeopleService;

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
        return view('swapi.people.index')->with('tenPeople', $this->peopleService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', People::class);

        return view('swapi.people.create');
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
    public function edit($id)
    {
        return view('swapi.people.edit')->with('people', $this->peopleService->find($id));
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

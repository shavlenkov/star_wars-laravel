<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePeopleRequest;

use App\Models\People;

use App\Services\PeopleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PeopleController extends Controller
{

    /**
     * PeopleController constructor
     *
     * @param PeopleService $peopleService
     */
    public function __construct(private PeopleService $peopleService)
    {
        $this->authorizeResource(People::class, 'people');
    }

    /**
     * Displays all characters
     *
     * @return View
     */
    public function index(): View
    {
        return view('swapi.people.index')->with('tenPeople', $this->peopleService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new character
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('swapi.people.create');
    }

    /**
     * Saves the new character to the database
     *
     * @param StoreUpdatePeopleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUpdatePeopleRequest $request): RedirectResponse
    {
        $this->peopleService->create($request->all());

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('swapi.people.show')->with('people', $this->peopleService->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        return view('swapi.people.edit')->with('people', $this->peopleService->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePeopleRequest $request, $id): RedirectResponse
    {
        $this->peopleService->edit($id, $request->all());

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully updated', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $this->peopleService->delete($id);

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully deleted', 'class' => 'alert-success']);
    }
}

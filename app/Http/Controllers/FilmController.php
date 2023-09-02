<?php

namespace App\Http\Controllers;

use App\Models\Film;

use App\Http\Requests\StoreUpdateFilmRequest;

use App\Services\FilmService;

class FilmController extends Controller
{

    /**
     * FilmController constructor
     *
     * @param FilmService $filmService
     */
    public function __construct(private FilmService $filmService)
    {
        $this->authorizeResource(Film::class, 'film');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.films.index')->with('tenFilms', $this->filmService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('swapi.films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateFilmRequest $request)
    {
        $this->filmService->create($request->all());

        return redirect(route('films.index'))->with(['message' => 'Film has been successfully created', 'class' => 'alert-success']);;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('swapi.films.show')->with('film', $this->filmService->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('swapi.films.edit')->with('film', $this->filmService->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateFilmRequest $request, $id)
    {
       $this->filmService->edit($id, $request->all());

        return redirect(route('films.index'))
            ->with(['message' => 'Film has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->filmService->delete($id);

        return redirect(route('films.index'))
            ->with(['message' => 'Film has been successfully deleted', 'class' => 'alert-success']);
    }
}

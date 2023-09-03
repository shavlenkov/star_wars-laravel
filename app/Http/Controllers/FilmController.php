<?php

namespace App\Http\Controllers;

use App\Models\Film;

use App\Http\Requests\StoreUpdateFilmRequest;

use App\Services\FilmService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
    public function index(): View
    {
        return view('swapi.films.index')->with('tenFilms', $this->filmService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('swapi.films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateFilmRequest $request): RedirectResponse
    {
        $this->filmService->create($request->all());

        return redirect(route('films.index'))->with(['message' => 'Film has been successfully created', 'class' => 'alert-success']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film): View
    {
        return view('swapi.films.show')->with('film', $film);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film): View
    {
        return view('swapi.films.edit')->with('film', $film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateFilmRequest $request, Film $film): RedirectResponse
    {
       $this->filmService->edit($film, $request->all());

        return redirect(route('films.index'))
            ->with(['message' => 'Film has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film): RedirectResponse
    {
        $this->filmService->delete($film);

        return redirect(route('films.index'))
            ->with(['message' => 'Film has been successfully deleted', 'class' => 'alert-success']);
    }
}

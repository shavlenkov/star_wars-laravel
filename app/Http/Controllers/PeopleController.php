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

use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.people.index')->with('tenPeople', People::simplePaginate(10));
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

        $images = [];

        if (!empty($request->file('images'))) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('images', 'public');
            }
        }

        $image_ids = [];

        for($i = 0; $i < count($images); $i++) {
            $image = Image::create([
                'url' => $images[$i]
            ]);

            $image_ids[] = $image->id;
        }

        $films = Film::whereIn('title', $request->films)->get();
        $species = Specie::whereIn('name', $request->species)->get();
        $starships = Starship::whereIn('name', $request->starships)->get();
        $vehicles = Vehicle::whereIn('name', $request->vehicles)->get();

        $people = People::create([
            'name' => $request->name,
            'height' => $request->height,
            'mass' => $request->mass,
            'hair_color' => $request->hair_color,
            'eye_color' => $request->eye_color,
            'skin_color' => $request->skin_color,
            'birth_year' => $request->birth_year,
            'gender' => $request->gender,
            'url' => $request->url,
            'planet_id' => Planet::where('name', '=', $request->homeworld)->first()->id
        ]);

        $people->films()->attach($films);
        $people->species()->attach($species);
        $people->starships()->attach($starships);
        $people->vehicles()->attach($vehicles);
        $people->images()->attach($image_ids);

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(People $person)
    {
        return view('swapi.people.show')->with('people', $person);
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
    public function update(Request $request, People $person)
    {

        $films = Film::whereIn('title', $request->films)->get();
        $species = Specie::whereIn('name', $request->species)->get();
        $starships = Starship::whereIn('name', $request->starships)->get();
        $vehicles = Vehicle::whereIn('name', $request->vehicles)->get();

        $images = Image::whereIn('url', $request->flags)->get();


        $images2 = [];

        if (!empty($request->file('images'))) {
            foreach ($request->file('images') as $image) {
                $images2[] = $image->store('images', 'public');
            }
        }

        $image_ids = [];

        for($i = 0; $i < count($images2); $i++) {
            $image = Image::create([
                'url' => $images2[$i]
            ]);

            $image_ids[] = $image;
        }


        $image_ids2 = collect($image_ids);

        $combinedImages = $images->merge($image_ids2);


        $person->name = $request->name;
        $person->height = $request->height;
        $person->mass = $request->mass;
        $person->hair_color = $request->hair_color;
        $person->eye_color = $request->eye_color;
        $person->skin_color = $request->skin_color;
        $person->birth_year = $request->birth_year;
        $person->gender = $request->gender;
        $person->planet_id = Planet::where('name', '=', $request->homeworld)->first()->id;

        $person->save();

        $person->films()->sync($films);
        $person->species()->sync($species);
        $person->starships()->sync($starships);
        $person->vehicles()->sync($vehicles);
        $person->images()->sync($combinedImages);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $person)
    {
        $person->delete();

        return redirect(route('people.index'))
            ->with(['message' => 'People has been successfully deleted', 'class' => 'alert-success']);
    }
}

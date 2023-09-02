<?php

namespace App\Services;

use App\Models\Film;
use App\Models\Image;
use App\Models\People;
use App\Models\Planet;
use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;

class PeopleService
{

    public function paginate(int $a) {
        return People::simplePaginate($a);
    }

    public function find(int $id) {
        return People::find($id);
    }

    public function create(array $data) {
        $image_ids = [];

        if (!empty($data['images'])) {
            foreach ($data['images'] as $image) {
                $imagePath = $image->store('images', 'public');

                $image = Image::create(['url' => $imagePath]);
                $image_ids[] = $image->id;
            }
        }

        $films = Film::whereIn('title', $data['films'])->get();
        $species = !empty($data['species']) ? Specie::whereIn('name', $data['species'])->get() : [];
        $starships = !empty($data['starships']) ? Starship::whereIn('name', $data['starships'])->get() : [];
        $vehicles = !empty($data['vehicles']) ? Vehicle::whereIn('name', $data['vehicles'])->get() : [];

        $people = People::create([
            'name' => $data['name'],
            'height' => $data['height'],
            'mass' => $data['mass'],
            'hair_color' => $data['hair_color'],
            'eye_color' => $data['eye_color'],
            'skin_color' => $data['skin_color'],
            'birth_year' => $data['birth_year'],
            'gender' => $data['gender'],
            'planet_id' => Planet::where('name', '=', $data['homeworld'])->first()->id
        ]);

        $people->films()->attach($films);
        $people->species()->attach($species);
        $people->starships()->attach($starships);
        $people->vehicles()->attach($vehicles);
        $people->images()->attach($image_ids);
    }

    public function edit(int $id, array $data) {

        $person = $this->find($id);

        $films = Film::whereIn('title', $data['films'])->get();
        $species = !empty($data['species']) ? Specie::whereIn('name', $data['species'])->get() : [];
        $starships = !empty($data['starships']) ? Starship::whereIn('name', $data['starships'])->get() : [];
        $vehicles = !empty($data['vehicles']) ? Vehicle::whereIn('name', $data['vehicles'])->get() : [];
        $image_ids = !empty($data['flags']) ? Image::whereIn('url', $data['flags'])->get() : [];

        if (!empty($data['images'])) {
            foreach ($data['images'] as $image) {
                $url = $image->store('images', 'public');

                $image1 = Image::create([
                    'url' => $url
                ]);

                !empty($data['flags']) ? $image_ids[] = $image1 : $image_ids[] = $image1->id;

            }
        }

        $person->name = $data['name'];
        $person->height = $data['height'];
        $person->mass = $data['mass'];
        $person->hair_color = $data['hair_color'];
        $person->eye_color = $data['eye_color'];
        $person->skin_color = $data['skin_color'];
        $person->birth_year = $data['birth_year'];
        $person->gender = $data['gender'];
        $person->planet_id = Planet::where('name', '=', $data['homeworld'])->first()->id;

        $person->save();

        $person->films()->sync($films);
        $person->species()->sync($species);
        $person->starships()->sync($starships);
        $person->vehicles()->sync($vehicles);
        $person->images()->sync($image_ids);

    }

    public function delete(int $id) {
        $person = $this->find($id);

        $person->delete();
    }

}

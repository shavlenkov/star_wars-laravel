<?php

namespace App\Services;

use App\Models\Film;
use App\Models\Planet;

class PlanetService
{
    public function paginate($a) {
        return Planet::simplePaginate($a);
    }

    public function find($id) {
        return Planet::find($id);
    }

    public function create($data) {
        $films = Film::whereIn('title', $data['films'])->get();

        $planet = Planet::create([
            'name' => $data['name'],
            'rotation_period' => $data['rotation_period'],
            'orbital_period' => $data['orbital_period'],
            'diameter' => $data['diameter'],
            'climate' => $data['climate'],
            'gravity' => $data['gravity'],
            'terrain' => $data['terrain'],
            'surface_water' => $data['surface_water'],
            'population' => $data['population'],
        ]);

        $planet->films()->attach($films);
    }

    public function edit($id, $data) {

        $planet = $this->find($id);

        $films = Film::whereIn('title', $data['films'])->get();

        $planet->name = $data['name'];
        $planet->rotation_period = $data['rotation_period'];
        $planet->orbital_period = $data['orbital_period'];
        $planet->diameter = $data['diameter'];
        $planet->climate = $data['climate'];
        $planet->gravity = $data['gravity'];
        $planet->terrain = $data['terrain'];
        $planet->surface_water = $data['surface_water'];
        $planet->population = $data['population'];
        $planet->save();

        $planet->films()->attach($films);
    }

    public function delete($id) {
        $planet = $this->find($id);

        $planet->delete();
    }


}

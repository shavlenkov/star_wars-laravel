<?php

namespace App\Services;

use App\Models\Starship;

class StarshipService
{
    public function paginate($a) {
        return Starship::simplePaginate($a);
    }

    public function find($id) {
        return Starship::find($id);
    }

    public function create($data) {
        $starship = Starship::create([
            'name' => $data['name'],
            'model' => $data['model'],
            'manufacturer' => $data['manufacturer'],
            'cost_in_credits' => $data['cost_in_credits'],
            'length' => $data['length'],
            'max_atmosphering_speed' => $data['max_atmosphering_speed'],
            'crew' => $data['crew'],
            'passengers' => $data['passengers'],
            'cargo_capacity' => $data['cargo_capacity'],
            'consumables' => $data['consumables'],
            'hyperdrive_rating' => $data['hyperdrive_rating'],
            'MGLT' => $data['MGLT'],
            'starship_class' => $data['starship_class']
        ]);
    }

    public function edit($id, $data) {
        $starship = $this->find($id);

        $starship->name = $data['name'];
        $starship->model = $data['model'];
        $starship->manufacturer = $data['manufacturer'];
        $starship->cost_in_credits = $data['cost_in_credits'];
        $starship->length = $data['length'];
        $starship->max_atmosphering_speed = $data['max_atmosphering_speed'];
        $starship->crew = $data['crew'];
        $starship->passengers = $data['passengers'];
        $starship->cargo_capacity = $data['cargo_capacity'];
        $starship->consumables = $data['consumables'];
        $starship->hyperdrive_rating = $data['hyperdrive_rating'];
        $starship->MGLT = $data['MGLT'];
        $starship->starship_class = $data['starship_class'];

        $starship->save();
    }

    public function delete($id) {
        $starship = $this->find($id);

        $starship->delete();
    }
}

<?php

namespace App\Services;

use App\Models\Vehicle;

class VehicleService
{
    public function paginate(int $a) {
        return Vehicle::simplePaginate($a);
    }

    public function create(array $data) {
        $vehicle = Vehicle::create([
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
            'vehicle_class' => $data['vehicle_class']
        ]);
    }

    public function edit(Vehicle $vehicle, array $data) {

        $vehicle->name = $data['name'];
        $vehicle->model = $data['model'];
        $vehicle->manufacturer = $data['manufacturer'];
        $vehicle->cost_in_credits = $data['cost_in_credits'];
        $vehicle->length = $data['length'];
        $vehicle->max_atmosphering_speed = $data['max_atmosphering_speed'];
        $vehicle->crew = $data['crew'];
        $vehicle->passengers = $data['passengers'];
        $vehicle->cargo_capacity = $data['cargo_capacity'];
        $vehicle->consumables = $data['consumables'];
        $vehicle->vehicle_class = $data['vehicle_class'];

        $vehicle->save();

    }

    public function delete(Vehicle $vehicle) {
        $vehicle->delete();
    }
}

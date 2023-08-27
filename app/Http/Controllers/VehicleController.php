<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVehicleRequest;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.vehicles.index')->with('tenVehicles', Vehicle::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('swapi.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateVehicleRequest $request)
    {
        $vehicle = Vehicle::create([
            'name' => $request->name,
            'model' => $request->model,
            'manufacturer' => $request->manufacturer,
            'cost_in_credits' => $request->cost_in_credits,
            'length' => $request->length,
            'max_atmosphering_speed' => $request->max_atmosphering_speed,
            'crew' => $request->crew,
            'passengers' => $request->passengers,
            'cargo_capacity' => $request->cargo_capacity,
            'consumables' => $request->consumables,
            'vehicle_class' => $request->vehicle_class
        ]);

        return redirect(route('vehicles.index'))->with(['message' => 'Vehicle has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('swapi.vehicles.show')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('swapi.vehicles.edit')->with(['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->name = $request->name;
        $vehicle->model = $request->model;
        $vehicle->manufacturer = $request->manufacturer;
        $vehicle->cost_in_credits = $request->cost_in_credits;
        $vehicle->length = $request->length;
        $vehicle->max_atmosphering_speed = $request->max_atmosphering_speed;
        $vehicle->crew = $request->crew;
        $vehicle->passengers = $request->passengers;
        $vehicle->cargo_capacity = $request->cargo_capacity;
        $vehicle->consumables = $request->consumables;
        $vehicle->vehicle_class = $request->vehicle_class;

        $vehicle->save();

        return redirect(route('vehicles.index'))
            ->with(['message' => 'Vehicle has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect(route('vehicles.index'))
            ->with(['message' => 'Vehicle has been successfully deleted', 'class' => 'alert-success']);
    }
}

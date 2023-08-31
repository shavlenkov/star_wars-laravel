<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVehicleRequest;
use App\Models\Vehicle;
use App\Services\VehicleService;

class VehicleController extends Controller
{

    /**
     * @var VehicleService $vehicleService
     */
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('swapi.vehicles.index')->with('tenVehicles', $this->vehicleService->paginate(config('app.paginate')));
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
        $this->vehicleService->create($request->all());

        return redirect(route('vehicles.index'))->with(['message' => 'Vehicle has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('swapi.vehicles.show')->with('vehicle', $this->vehicleService->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('swapi.vehicles.edit')->with('vehicle', $this->vehicleService->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateVehicleRequest $request, $id)
    {
        $this->vehicleService->edit($id, $request->all());

        return redirect(route('vehicles.index'))
            ->with(['message' => 'Vehicle has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->vehicleService->delete($id);

        return redirect(route('vehicles.index'))
            ->with(['message' => 'Vehicle has been successfully deleted', 'class' => 'alert-success']);
    }
}

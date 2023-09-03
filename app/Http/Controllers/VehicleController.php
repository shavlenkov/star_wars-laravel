<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVehicleRequest;
use App\Models\Vehicle;
use App\Services\VehicleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VehicleController extends Controller
{

    public function __construct(private VehicleService $vehicleService)
    {
        $this->authorizeResource(Vehicle::class, 'vehicle');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('swapi.vehicles.index')->with('tenVehicles', $this->vehicleService->paginate(config('app.paginate')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('swapi.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateVehicleRequest $request): RedirectResponse
    {
        $this->vehicleService->create($request->all());

        return redirect(route('vehicles.index'))->with(['message' => 'Vehicle has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle): View
    {
        return view('swapi.vehicles.show')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle): View
    {
        return view('swapi.vehicles.edit')->with('vehicle', $vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateVehicleRequest $request, Vehicle $vehicle): RedirectResponse
    {
        $this->vehicleService->edit($vehicle, $request->all());

        return redirect(route('vehicles.index'))
            ->with(['message' => 'Vehicle has been successfully created', 'class' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        $this->vehicleService->delete($vehicle);

        return redirect(route('vehicles.index'))
            ->with(['message' => 'Vehicle has been successfully deleted', 'class' => 'alert-success']);
    }
}

@extends('layouts.app')

@section('title',  'Star Wars - Starship')

@section('content')

    <h2>Edit vehicles</h2>

    <form class="form-group" method="POST" action="{{ route('vehicles.update', $vehicle) }}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name:</label>
        <input class="form-control w-25" name="name" type="text" value="{{ $vehicle->name }}" placeholder="Sand Crawler"/><br/><br/>
        <label for="model" class="form-label">Model:</label>
        <input class="form-control w-25" name="model" type="text" value="{{ $vehicle->model }}" placeholder="Digger Crawler"/><br/><br/>
        <label for="manufacturer" class="form-label">Manufacturer:</label>
        <input class="form-control w-25" name="manufacturer" type="text" value="{{ $vehicle->manufacturer }}" placeholder="Corellia Mining Corporation"/><br/><br/>
        <label for="cost_in_credits" class="form-label">Cost in Credits:</label>
        <input class="form-control w-25 numberFormat" name="cost_in_credits" type="number" value="{{ $vehicle->cost_in_credits }}" placeholder="150000"/><br/><br/>
        <label for="length" class="form-label">Length:</label>
        <input class="form-control w-25 numberFormat" name="length" type="number" value="{{ $vehicle->length }}" placeholder="36.8"/><br/><br/>
        <label for="max_atmosphering_speed" class="form-label">Max Atmosphering Speed:</label>
        <input class="form-control w-25 numberFormat" name="max_atmosphering_speed" type="number" value="{{ $vehicle->max_atmosphering_speed }}" placeholder="30"/><br/><br/>
        <label for="crew" class="form-label">Crew:</label>
        <input class="form-control w-25 numberFormat" name="crew" type="number" value="{{ $vehicle->crew }}" placeholder="46"/><br/><br/>
        <label for="passengers" class="form-label">Passengers:</label>
        <input class="form-control w-25 numberFormat" name="passengers" type="number" value="{{ $vehicle->passengers }}" placeholder="30"/><br/><br/>
        <label for="cargo_capacity" class="form-label">Cargo Capacity:</label>
        <input class="form-control w-25 numberFormat" name="cargo_capacity" type="number" value="{{ $vehicle->cargo_capacity }}" placeholder="50000"/><br/><br/>
        <label for="consumables" class="form-label">Consumables:</label>
        <input class="form-control w-25" name="consumables" type="text" value="{{ $vehicle->consumables }}" placeholder="2 months"/><br/><br/>
        <label for="vehicle_class" class="form-label">Vehicle Class:</label>
        <input class="form-control w-25" name="vehicle_class" type="text" value="{{ $vehicle->vehicle_class }}" placeholder="wheeled"/><br/><br/>
        <button type="submit" class="btn btn-success">Изменить</button>

        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">
            Удалить
        </button>
    </form>

    @include('components.modal', ['route' => route('vehicles.destroy', $vehicle)])

@endsection

@extends('layouts.app')

@section('title',  'Star Wars - Starship')

@section('content')

    <h2>Create vehicles</h2>

    <form class="form-group" method="POST" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name:</label>
        <input class="form-control w-25" name="name" type="text" value="{{ old('name') }}" placeholder="Sand Crawler"/><br/><br/>
        <label for="model" class="form-label">Model:</label>
        <input class="form-control w-25" name="model" type="text" value="{{ old('model') }}" placeholder="Digger Crawler"/><br/><br/>
        <label for="manufacturer" class="form-label">Manufacturer:</label>
        <input class="form-control w-25" name="manufacturer" type="text" value="{{ old('manufacturer') }}" placeholder="Corellia Mining Corporation"/><br/><br/>
        <label for="cost_in_credits" class="form-label">Cost in Credits:</label>
        <input class="form-control w-25 numberFormat" name="cost_in_credits" type="number" value="{{ old('cost_in_credits') }}" placeholder="150000"/><br/><br/>
        <label for="length" class="form-label">Length:</label>
        <input class="form-control w-25 numberFormat" name="length" type="number" value="{{ old('length') }}" placeholder="36.8"/><br/><br/>
        <label for="max_atmosphering_speed" class="form-label">Max Atmosphering Speed:</label>
        <input class="form-control w-25 numberFormat" name="max_atmosphering_speed" type="number" value="{{ old('max_atmosphering_speed') }}" placeholder="30"/><br/><br/>
        <label for="crew" class="form-label">Crew:</label>
        <input class="form-control w-25 numberFormat" name="crew" type="number" value="{{ old('crew') }}" placeholder="46"/><br/><br/>
        <label for="passengers" class="form-label">Passengers:</label>
        <input class="form-control w-25 numberFormat" name="passengers" type="number" value="{{ old('passengers') }}" placeholder="30"/><br/><br/>
        <label for="cargo_capacity" class="form-label">Cargo Capacity:</label>
        <input class="form-control w-25 numberFormat" name="cargo_capacity" type="number" value="{{ old('cargo_capacity') }}" placeholder="50000"/><br/><br/>
        <label for="consumables" class="form-label">Consumables:</label>
        <input class="form-control w-25" name="consumables" type="text" value="{{ old('consumables') }}" placeholder="2 months"/><br/><br/>
        <label for="vehicle_class" class="form-label">Vehicle Class:</label>
        <input class="form-control w-25" name="vehicle_class" type="text" value="{{ old('vehicle_class') }}" placeholder="wheeled"/><br/><br/>
        <button type="submit" class="btn btn-success">Create</button>
    </form>

@endsection

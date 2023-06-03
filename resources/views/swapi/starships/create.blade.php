@extends('layouts.app')

@section('title',  'Star Wars - Starship')

@section('content')

    <h2>Create starships</h2>

    <form class="form-group" method="POST" action="{{ route('starships.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name:</label>
        <input class="form-control w-25" name="name" type="text" value="{{ old('name') }}" placeholder="CR90 corvette"/><br/><br/>
        <label for="model" class="form-label">Model:</label>
        <input class="form-control w-25" name="model" type="text" value="{{ old('model') }}" placeholder="CR90 corvette"/><br/><br/>
        <label for="manufacturer" class="form-label">Manufacturer:</label>
        <input class="form-control w-25" name="manufacturer" type="text" value="{{ old('manufacturer') }}" placeholder="Corellian Engineering Corporation"/><br/><br/>
        <label for="cost_in_credits" class="form-label">Cost in Credits:</label>
        <input class="form-control w-25 numberFormat" name="cost_in_credits" type="number" value="{{ old('cost_in_credits') }}" placeholder="3500000"/><br/><br/>
        <label for="length" class="form-label">Length:</label>
        <input class="form-control w-25 numberFormat" name="length" type="number" value="{{ old('length') }}" placeholder="150"/><br/><br/>
        <label for="max_atmosphering_speed" class="form-label">Max Atmosphering Speed:</label>
        <input class="form-control w-25 numberFormat" name="max_atmosphering_speed" type="number" value="{{ old('max_atmosphering_speed') }}" placeholder="950"/><br/><br/>
        <label for="crew" class="form-label">Crew:</label>
        <input class="form-control w-25" name="crew" type="text" value="{{ old('crew') }}" placeholder="30-165"/><br/><br/>
        <label for="passengers" class="form-label">Passengers:</label>
        <input class="form-control w-25 numberFormat" name="passengers" type="number" value="{{ old('passengers') }}" placeholder="600"/><br/><br/>
        <label for="cargo_capacity" class="form-label">Cargo Capacity:</label>
        <input class="form-control w-25 numberFormat" name="cargo_capacity" type="number" value="{{ old('cargo_capacity') }}" placeholder="3000000"/><br/><br/>
        <label for="consumables" class="form-label">Consumables:</label>
        <input class="form-control w-25" name="consumables" type="text" value="{{ old('consumables') }}" placeholder="1 year"/><br/><br/>
        <label for="hyperdrive_rating" class="form-label">Hyperdrive Rating:</label>
        <input class="form-control w-25 numberFormat" name="hyperdrive_rating" type="number" value="{{ old('hyperdrive_rating') }}" placeholder="2.0"/><br/><br/>
        <label for="MGLT" class="form-label">MGLT:</label>
        <input class="form-control w-25 numberFormat" name="MGLT" type="number" value="{{ old('MGLT') }}" placeholder="60"/><br/><br/>
        <label for="starship_class" class="form-label">Starship Class:</label>
        <input class="form-control w-25" name="starship_class" type="text" value="{{ old('starship_class') }}" placeholder="corvette"/><br/><br/>
        <button type="submit" class="btn btn-success">Create</button>
    </form>


@endsection

@extends('layouts.app')

@section('title',  'Star Wars - Starship')

@section('content')

    <h2>Edit starships</h2>

    <form class="form-group" method="POST" action="{{ route('starships.update', $starship) }}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name:</label>
        <input class="form-control w-25" name="name" type="text" value="{{ $starship->name }}" placeholder="CR90 corvette"/><br/><br/>
        <label for="model" class="form-label">Model:</label>
        <input class="form-control w-25" name="model" type="text" value="{{ $starship->model }}" placeholder="CR90 corvette"/><br/><br/>
        <label for="manufacturer" class="form-label">Manufacturer:</label>
        <input class="form-control w-25" name="manufacturer" type="text" value="{{ $starship->manufacturer }}" placeholder="Corellian Engineering Corporation"/><br/><br/>
        <label for="cost_in_credits" class="form-label">Cost in Credits:</label>
        <input class="form-control w-25 numberFormat" name="cost_in_credits" type="number" value="{{ $starship->cost_in_credits }}" placeholder="3500000"/><br/><br/>
        <label for="length" class="form-label">Length:</label>
        <input class="form-control w-25 numberFormat" name="length" type="number" value="{{ $starship->length }}" placeholder="150"/><br/><br/>
        <label for="max_atmosphering_speed" class="form-label">Max Atmosphering Speed:</label>
        <input class="form-control w-25 numberFormat" name="max_atmosphering_speed" type="number" value="{{ $starship->max_atmosphering_speed }}" placeholder="950"/><br/><br/>
        <label for="crew" class="form-label">Crew:</label>
        <input class="form-control w-25" name="crew" type="text" value="{{ $starship->crew }}" placeholder="30-165"/><br/><br/>
        <label for="passengers" class="form-label">Passengers:</label>
        <input class="form-control w-25 numberFormat" name="passengers" type="number" value="{{ $starship->passengers }}" placeholder="600"/><br/><br/>
        <label for="cargo_capacity" class="form-label">Cargo Capacity:</label>
        <input class="form-control w-25 numberFormat" name="cargo_capacity" type="number" value="{{ $starship->cargo_capacity }}" placeholder="3000000"/><br/><br/>
        <label for="consumables" class="form-label">Consumables:</label>
        <input class="form-control w-25" name="consumables" type="text" value="{{ $starship->consumables }}" placeholder="1 year"/><br/><br/>
        <label for="hyperdrive_rating" class="form-label">Hyperdrive Rating:</label>
        <input class="form-control w-25 numberFormat" name="hyperdrive_rating" type="number" value="{{ $starship->hyperdrive_rating }}" placeholder="2.0"/><br/><br/>
        <label for="MGLT" class="form-label">MGLT:</label>
        <input class="form-control w-25 numberFormat" name="MGLT" type="number" value="{{ $starship->MGLT }}" placeholder="60"/><br/><br/>
        <label for="starship_class" class="form-label">Starship Class:</label>
        <input class="form-control w-25" name="starship_class" type="text" value="{{ $starship->starship_class }}" placeholder="corvette"/><br/><br/>
        <button type="submit" class="btn btn-success">Изменить</button>

        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">
            Удалить
        </button>
    </form>

    @include('components.modal', ['route' => route('starships.destroy', $starship)])

@endsection

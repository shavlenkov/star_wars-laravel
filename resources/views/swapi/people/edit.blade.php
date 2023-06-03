@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <h2>Edit people</h2>

    <form class="form-group" method="POST" action="{{ route('people.update',  $people) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="name" class="form-label">Name: </label>
        <input class="form-control w-25" name="name" type="text" value="{{ $people->name }}" placeholder="Luke Skywalker"/><br/><br/>
        <label for="height" class="form-label">Height: </label>
        <input class="form-control w-25 numberFormat"  name="height" type="number" value="{{ $people->height }}" placeholder="172"/><br/><br/>
        <label for="mass" class="form-label">Mass: </label>
        <input class="form-control w-25 numberFormat"  name="mass" type="number" value="{{ $people->mass }}" placeholder="77"/><br/><br/>
        <label for="hair_color" class="form-label">Hair color: </label>
        <input class="form-control w-25" name="hair_color" type="text" value="{{ $people->hair_color }}" placeholder="blond"/><br/><br/>
        <label for="skin_color" class="form-label">Skin color: </label>
        <input class="form-control w-25" id="skin_color" name="skin_color" type="text" value="{{ $people->skin_color }}" placeholder="fair"/><br/><br/>
        <label for="eye_color" class="form-label">Eye color: </label>
        <input class="form-control w-25" id="eye_color" name="eye_color" type="text" value="{{ $people->eye_color }}" placeholder="blue"/><br/><br/>
        <label for="birth_year" class="form-label">Birth year: </label>
        <input class="form-control w-25" id="birth_year" name="birth_year" type="text" value="{{ $people->birth_year }}" placeholder="19BBY"/><br/><br/>
        <label for="gender" class="form-label">Gender: </label>
        <select class="form-control w-25" name="gender">
            <option {{ $people->gender == 'male' ? 'selected' : '' }}>male</option>
            <option {{ $people->gender == 'female' ? 'selected' : '' }}>female</option>
            <option {{ $people->gender == 'n/a' ? 'selected' : '' }}>n/a</option>
        </select><br/><br/>
        <label for="homeworld" class="form-label">Homeworld: </label>
        <select class="form-control w-25" id="homeworld" name="homeworld">
            @foreach($planets as $planet)
                <option {{ $people->planet->name == $planet->name ? 'selected' : '' }}>{{ $planet->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="films" class="form-label">Films: </label>
        <select class="form-control w-25" id="films" name="films[]" multiple>
            @foreach($films as $film)
                <option {{ in_array($film->title, array_column($people->films->toArray(), 'title')) ? 'selected' : '' }}>{{ $film->title }}</option>
            @endforeach
        </select><br/><br/>
        <label for="species" class="form-label">Species: </label>
        <select class="form-control w-25" id="species" name="species[]" multiple>
            @foreach($species as $specie)
                <option {{ in_array($specie->name, array_column($people->species->toArray(), 'name')) ? 'selected' : '' }}>{{ $specie->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="starships" class="form-label">Starships: </label>
        <select class="form-control w-25" id="starships" name="starships[]" multiple>
            @foreach($starships as $starship)
                <option {{ in_array($starship->name, array_column($people->starships->toArray(), 'name')) ? 'selected' : '' }}>{{ $starship->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="vehicles" class="form-label">Vehicles: </label>
        <select class="form-control w-25" id="vehicles" name="vehicles[]" multiple>
            @foreach($vehicles as $vehicle)
                <option {{ in_array($vehicle->name, array_column($people->vehicles->toArray(), 'name')) ? 'selected' : '' }}>{{ $vehicle->name }}</option>
            @endforeach
        </select><br/><br/>

        @foreach($people->images as $image)
            <input name="flags[]" type="checkbox" value="{{ $image->url }}" checked/>
            <label><a href="{{ Storage::url($image->url) }}">{{ $image->url }}</a></label><br/>
        @endforeach
        <br>
        <input class="form-control w-25" type="file" name="images[]" multiple/><br/><br/>

        <button type="submit" class="btn btn-success">Изменить</button>

        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">
            Удалить
        </button>

    </form>

    @include('components.modal', ['route' => route('people.destroy', $people)])

@endsection

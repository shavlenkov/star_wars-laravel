@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <h2>Create people</h2>

    <form class="form-group" method="POST" action="{{ route('people.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name: </label>
        <input class="form-control w-25" name="name" type="text" value="{{ old('name') }}" placeholder="Luke Skywalker"/><br/><br/>
        <label for="height" class="form-label">Height: </label>
        <input class="form-control w-25 numberFormat"  name="height" type="number" value="{{ old('height') }}" placeholder="172"/><br/><br/>
        <label for="mass" class="form-label">Mass: </label>
        <input class="form-control w-25 numberFormat"  name="mass" type="number" value="{{ old('mass') }}" placeholder="77"/><br/><br/>
        <label for="hair_color" class="form-label">Hair color: </label>
        <input class="form-control w-25" name="hair_color" type="text" value="{{ old('hair_color') }}" placeholder="blond"/><br/><br/>
        <label for="skin_color" class="form-label">Skin color: </label>
        <input class="form-control w-25" id="skin_color" name="skin_color" type="text" value="{{ old('skin_color') }}" placeholder="fair"/><br/><br/>
        <label for="eye_color" class="form-label">Eye color: </label>
        <input class="form-control w-25" id="eye_color" name="eye_color" type="text" value="{{ old('eye_color') }}" placeholder="blue"/><br/><br/>
        <label for="birth_year" class="form-label">Birth year: </label>
        <input class="form-control w-25" id="birth_year" name="birth_year" type="text" value="{{ old('birth_year') }}" placeholder="19BBY"/><br/><br/>
        <label for="gender" class="form-label">Gender: </label>
        <select class="form-control w-25" name="gender">
            <option>male</option>
            <option>female</option>
            <option>n/a</option>
        </select><br/><br/>
        <label for="homeworld" class="form-label">Homeworld: </label>
        <select class="form-control w-25" id="homeworld" name="homeworld">
            @foreach($planets as $planet)
                <option>{{ $planet->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="films" class="form-label">Films: </label>
        <select class="form-control w-25" id="films" name="films[]" multiple>
            @foreach($films as $film)
                <option>{{ $film->title }}</option>
            @endforeach
        </select><br/><br/>
        <label for="species" class="form-label">Species: </label>
        <select class="form-control w-25" id="species" name="species[]" multiple>
            @foreach($species as $specie)
                <option>{{ $specie->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="starships" class="form-label">Starships: </label>
        <select class="form-control w-25" id="starships" name="starships[]" multiple>
            @foreach($starships as $starship)
                <option>{{ $starship->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="vehicles" class="form-label">Vehicles: </label>
        <select class="form-control w-25" id="vehicles" name="vehicles[]" multiple>
            @foreach($vehicles as $vehicle)
                <option>{{ $vehicle->name }}</option>
            @endforeach
        </select><br/><br/>
        <input class="form-control w-25" type="file" name="images[]" multiple/><br/><br/>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>


@endsection

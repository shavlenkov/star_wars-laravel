@extends('layouts.app')

@section('title',  'Star Wars - Films')

@section('content')

    <h2>Create films</h2>

    <form class="form-group" method="POST" action="{{ route('films.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="title" class="form-label">Title:</label>
        <input class="form-control w-25" name="title" type="text" value="{{ old('title') }}" placeholder="A New Hope"/><br/><br/>
        <label for="episode_id" class="form-label">Episode ID:</label>
        <input class="form-control w-25" name="episode_id" type="number" value="{{ old('episode_id') }}" placeholder="4"/><br/><br/>
        <label for="opening_crawl" class="form-label">Opening Crawl:</label>
        <textarea class="form-control w-25" name="opening_crawl" rows="5" placeholder="It is a period of civil war...">{{ old('opening_crawl') }}</textarea><br/><br/>
        <label for="director" class="form-label">Director:</label>
        <input class="form-control w-25" name="director" type="text" value="{{ old('director') }}" placeholder="George Lucas"/><br/><br/>
        <label for="producer" class="form-label">Producer:</label>
        <input class="form-control w-25" name="producer" type="text" value="{{ old('producer') }}" placeholder="Gary Kurtz, Rick McCallum"/><br/><br/>
        <label for="release_date" class="form-label">Release Date:</label>
        <input class="form-control w-25" name="release_date" type="date" value="{{ old('release_date') }}"/><br/><br/>
        <label for="species" class="form-label">Species:</label>
        <select class="form-control w-25" id="species" name="species[]" multiple>
            @foreach(Specie::all() as $specie)
              <option>{{ $specie->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="starships" class="form-label">Starships:</label>
        <select class="form-control w-25" id="starships" name="starships[]" multiple>
            @foreach(Starship::all() as $starship)
              <option>{{ $starship->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="vehicles" class="form-label">Vehicles:</label>
        <select class="form-control w-25" id="vehicles" name="vehicles[]" multiple>
            @foreach(Vehicle::all() as $vehicle)
              <option>{{ $vehicle->name }}</option>
            @endforeach
        </select><br/><br/>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>

@endsection

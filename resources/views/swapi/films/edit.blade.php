@extends('layouts.app')

@section('title',  'Star Wars - Films')

@section('content')

    <h2>Edit films</h2>

    <form class="form-group" method="POST" action="{{ route('films.update', $film) }}" enctype="multipart/form-data">
        @csrf
        <label for="title" class="form-label">Title:</label>
        <input class="form-control w-25" name="title" type="text" value="{{ $film->title }}" placeholder="A New Hope"/><br/><br/>
        <label for="episode_id" class="form-label">Episode ID:</label>
        <input class="form-control w-25" name="episode_id" type="number" value="{{ $film->episode_id }}" placeholder="4"/><br/><br/>
        <label for="opening_crawl" class="form-label">Opening Crawl:</label>
        <textarea class="form-control w-25" name="opening_crawl" rows="5" placeholder="It is a period of civil war...">{{ $film->opening_crawl }}</textarea><br/><br/>
        <label for="director" class="form-label">Director:</label>
        <input class="form-control w-25" name="director" type="text" value="{{ $film->director }}" placeholder="George Lucas"/><br/><br/>
        <label for="producer" class="form-label">Producer:</label>
        <input class="form-control w-25" name="producer" type="text" value="{{ $film->producer }}" placeholder="Gary Kurtz, Rick McCallum"/><br/><br/>
        <label for="release_date" class="form-label">Release Date:</label>
        <input class="form-control w-25" name="release_date" type="date" value="{{ $film->release_date }}"/><br/><br/>
        <label for="species" class="form-label">Species:</label>
        <select class="form-control w-25" id="species" name="species[]" multiple>
            @foreach($species as $specie)
                <option {{ in_array($specie->name, array_column($film->species->toArray(), 'name')) ? 'selected' : '' }}>{{ $specie->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="starships" class="form-label">Starships:</label>
        <select class="form-control w-25" id="starships" name="starships[]" multiple>
            @foreach($starships as $starship)
                <option {{ in_array($starship->name, array_column($film->starships->toArray(), 'name')) ? 'selected' : '' }}>{{ $starship->name }}</option>
            @endforeach
        </select><br/><br/>
        <label for="vehicles" class="form-label">Vehicles:</label>
        <select class="form-control w-25" id="vehicles" name="vehicles[]" multiple>
            @foreach($vehicles as $vehicle)
                <option {{ in_array($vehicle->name, array_column($film->vehicles->toArray(), 'name')) ? 'selected' : '' }}>{{ $vehicle->name }}</option>
            @endforeach
        </select><br/><br/>

        <button type="submit" class="btn btn-success">Изменить</button>

        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">
            Удалить
        </button>
    </form>

    @include('components.modal', ['route' => route('films.destroy', $film)])

@endsection

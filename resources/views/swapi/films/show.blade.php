@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <p><b>Title:</b> {{ $film->title }}</p>
    <p><b>Episode ID:</b> {{ $film->episode_id }}</p>
    <p><b>Opening Crawl:</b> {{ $film->opening_crawl }}</p>
    <p><b>Director:</b> {{ $film->director }}</p>
    <p><b>Producer:</b> {{ $film->producer }}</p>
    <p><b>Release Date:</b> {{ $film->release_date }}</p>

    <b>People:</b>
    @if(count($film->people) != 0)
        <ul>
            @foreach($film->people as $people)
                <li><a href="{{ route('people.show', $people->id) }}">{{ $people->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>People not found</p>
    @endif

    <b>Planets:</b>
    @if(count($film->planets) != 0)
        <ul>
            @foreach($film->planets as $planet)
                <li><a href="{{ route('planets.show', $planet->id) }}">{{ $planet->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Planets not found</p>
    @endif

    <b>Species:</b>
    @if(count($film->species) != 0)
        <ul>
            @foreach($film->species as $specie)
                <li><a href="{{ route('species.show', $specie->id) }}">{{ $specie->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Species not found</p>
    @endif

    <b>Starships:</b>
    @if(count($film->starships) != 0)
        <ul>
            @foreach($film->starships as $starship)
                <li><a href="{{ route('starships.show', $starship->id) }}">{{ $starship->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Starships not found</p>
    @endif

    <b>Vehicles:</b>
    @if(count($film->vehicles) != 0)
        <ul>
            @foreach($film->vehicles as $vehicle)
                <li><a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Vehicles not found</p>
    @endif




@endsection

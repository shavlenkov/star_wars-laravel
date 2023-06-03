@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <p><b>Name: </b>{{ $planet->name }}</p>
    <p><b>Rotation Period: </b>{{ $planet->rotation_period }}</p>
    <p><b>Orbital Period: </b>{{ $planet->orbital_period }}</p>
    <p><b>Diameter: </b>{{ $planet->diameter }}</p>
    <p><b>Climate: </b>{{ $planet->climate }}</p>
    <p><b>Gravity: </b>{{ $planet->gravity }}</p>
    <p><b>Terrain: </b>{{ $planet->terrain }}</p>
    <p><b>Surface Water: </b>{{ $planet->surface_water }}</p>
    <p><b>Population: </b>{{ $planet->population }}</p>

    <b>People:</b>
    @if(count($planet->people) != 0)
        <ul>
            @foreach($planet->people as $people)
                <li><a href="{{ route('people.show', $people->id) }}">{{ $people->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>People not found</p>
    @endif

    <b>Films:</b>
    @if(count($planet->films) != 0)
        <ul>
            @foreach($planet->films as $film)
                <li><a href="{{ route('films.show', $film->id) }}">{{ $film->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Films not found</p>
    @endif

@endsection

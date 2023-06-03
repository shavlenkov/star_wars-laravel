@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <p><b>Name:</b> {{ $people->name }}</p>
    <p><b>Height:</b> {{ $people->height }}</p>
    <p><b>Mass:</b>  {{ $people->mass }}</p>
    <p><b>Hair Color:</b>  {{ $people->hair_color }}</p>
    <p><b>Skin Color:</b>  {{ $people->skin_color }}</p>
    <p><b>Eye Color:</b>  {{ $people->eye_color }}</p>
    <p><b>Birth Year:</b>  {{ $people->birth_year }}</p>
    <p><b>Gender:</b>  {{ $people->gender }}</p>

    <p><b>Homeworld:</b> <a href="{{ route('planets.show', $people->planet->id) }}">{{ $people->planet->name }}</a></p>

    <b>Films:</b>
    @if(count($people->films) != 0)
        <ul>
            @foreach($people->films as $film)
                <li><a href="{{ route('films.show', $film->id) }}">{{ $film->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Films not found</p>
    @endif

    <b>Species:</b>
    @if(count($people->species) != 0)
        <ul>
            @foreach($people->species as $specie)
                <li><a href="{{ route('species.show', $specie->id) }}">{{ $specie->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Species not found</p>
    @endif


    <b>Starships:</b>
    @if(count($people->starships) != 0)
        <ul>
            @foreach($people->starships as $starship)
                <li><a href="{{ route('starships.show', $starship->id) }}">{{ $starship->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Starships not found</p>
    @endif

    <b>Vehicles:</b>
    @if(count($people->vehicles) != 0)
        <ul>
            @foreach($people->vehicles as $vehicle)
                <li><a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Vehicles not found</p>
    @endif

    <b>Images:</b>
    <br>
    @if(count($people->images) != 0)
        @foreach($people->images as $image)
            <img src="{{ Storage::url($image->url) }}" alt=""><br/>
        @endforeach
    @else
        <p>Images not found</p>
    @endif

@endsection

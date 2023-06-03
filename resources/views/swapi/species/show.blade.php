@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <p><b>Name:</b> {{ $specie->name }}</p>
    <p><b>Classification:</b> {{ $specie->classification }}</p>
    <p><b>Average Height:</b> {{ $specie->average_height }}</p>
    <p><b>Skin Colors:</b> {{ $specie->skin_colors }}</p>
    <p><b>Hair Colors:</b> {{ $specie->hair_colors }}</p>
    <p><b>Eye Colors:</b> {{ $specie->eye_colors }}</p>
    <p><b>Average Lifespan:</b> {{ $specie->average_lifespan }}</p>
    <p><b>Language:</b> {{ $specie->language }}</p>

    <b>People:</b>
    @if(count($specie->people) != 0)
        <ul>
            @foreach($specie->people as $people)
                <li><a href="{{ route('people.show', $people->id) }}">{{ $people->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>People not found</p>
    @endif

    <b>Films:</b>
    @if(count($specie->films) != 0)
        <ul>
            @foreach($specie->films as $film)
                <li><a href="{{ route('films.show', $film->id) }}">{{ $film->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Films not found</p>
    @endif




@endsection

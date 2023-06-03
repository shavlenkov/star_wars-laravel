@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <p><b>Name:</b> {{ $starship->name }}</p>
    <p><b>Model:</b> {{ $starship->model }}</p>
    <p><b>Manufacturer:</b> {{ $starship->manufacturer }}</p>
    <p><b>Cost in Credits:</b> {{ $starship->cost_in_credits }}</p>
    <p><b>Length:</b> {{ $starship->length }}</p>
    <p><b>Max Atmosphering Speed:</b> {{ $starship->max_atmosphering_speed }}</p>
    <p><b>Crew:</b> {{ $starship->crew }}</p>
    <p><b>Passengers:</b> {{ $starship->passengers }}</p>
    <p><b>Cargo Capacity:</b> {{ $starship->cargo_capacity }}</p>
    <p><b>Consumables:</b> {{ $starship->consumables }}</p>
    <p><b>Hyperdrive Rating:</b> {{ $starship->hyperdrive_rating }}</p>
    <p><b>MGLT:</b> {{ $starship->MGLT }}</p>
    <p><b>Starship Class:</b> {{ $starship->starship_class }}</p>

    <b>People:</b>
    @if(count($starship->people) != 0)
        <ul>
            @foreach($starship->people as $people)
                <li><a href="{{ route('people.show', $people->id) }}">{{ $people->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>People not found</p>
    @endif

    <b>Films:</b>
    @if(count($starship->films) != 0)
        <ul>
            @foreach($starship->films as $film)
                <li><a href="{{ route('films.show', $film->id) }}">{{ $film->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Films not found</p>
    @endif




@endsection

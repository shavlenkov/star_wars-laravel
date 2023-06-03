@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    <p><b>Name:</b> {{ $vehicle->name }}</p>
    <p><b>Model:</b> {{ $vehicle->model }}</p>
    <p><b>Manufacturer:</b> {{ $vehicle->manufacturer }}</p>
    <p><b>Cost in Credits:</b> {{ $vehicle->cost_in_credits }}</p>
    <p><b>Length:</b> {{ $vehicle->length }}</p>
    <p><b>Max Atmosphering Speed:</b> {{ $vehicle->max_atmosphering_speed }}</p>
    <p><b>Crew:</b> {{ $vehicle->crew }}</p>
    <p><b>Passengers:</b> {{ $vehicle->passengers }}</p>
    <p><b>Cargo Capacity:</b> {{ $vehicle->cargo_capacity }}</p>
    <p><b>Consumables:</b> {{ $vehicle->consumables }}</p>
    <p><b>Vehicle Class:</b> {{ $vehicle->vehicle_class }}</p>

    <b>People:</b>
    @if(count($vehicle->people) != 0)
        <ul>
            @foreach($vehicle->people as $people)
                <li><a href="{{ route('people.show', $people->id) }}">{{ $people->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>People not found</p>
    @endif

    <b>Films:</b>
    @if(count($vehicle->films) != 0)
        <ul>
            @foreach($vehicle->films as $film)
                <li><a href="{{ route('films.show', $film->id) }}">{{ $film->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Films not found</p>
    @endif




@endsection

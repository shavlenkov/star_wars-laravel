@extends('layouts.app')

@section('title',  'Star Wars - Planets')

@section('content')

    @can('create', App\Models\Planet::class)
    <a class="btn btn-success" href="{{ route('planets.create') }}">Create</a>
    <br><br>
    @endcan

    <table class="table table-dark">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rotation Period</th>
            <th>Orbital Period</th>
            <th>Surface Water</th>
            <th>Population</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tenPlanets as $planet)
            <tr>
                <td>{{ $planet->id }}</td>
                <td>{{ $planet->name }}</td>
                <td>{{ $planet->rotation_period }}</td>
                <td>{{ $planet->orbital_period }}</td>
                <td>{{ $planet->surface_water }}</td>
                <td>{{ $planet->population }}</td>
                <td><a class="btn btn-info" href="{{ route('planets.show', $planet->id) }}"><i class="fa-solid fa-eye"></i></a></td>
                @can('update', App\Models\Planet::class)
                <td><a class="btn btn-warning" href="{{ route('planets.edit', $planet->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$tenPlanets->links()}}

@endsection

@extends('layouts.app')

@section('title',  'Star Wars - Films')

@section('content')

    @can('create', new Vehicle())
    <a class="btn btn-success" href="{{ route('vehicles.create') }}">Create</a>
    <br><br>
    @endcan

    <table class="table table-dark">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Model</th>
            <th>Manufacturer</th>
            <th>Cost in credits</th>
            <th>Length</th>
            <th>Vehicle class</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tenVehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->name }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->manufacturer }}</td>
                <td>{{ $vehicle->cost_in_credits }}</td>
                <td>{{ $vehicle->length }}</td>
                <td>{{ $vehicle->vehicle_class }}</td>
                <td><a class="btn btn-info" href="{{ route('vehicles.show', $vehicle->id) }}"><i class="fa-solid fa-eye"></i></a></td>
                @can('update', new Vehicle())
                <td><a class="btn btn-warning" href="{{ route('vehicles.edit', $vehicle->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$tenVehicles->links()}}

@endsection

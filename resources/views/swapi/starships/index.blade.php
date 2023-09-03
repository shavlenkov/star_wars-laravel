@extends('layouts.app')

@section('title',  'Star Wars - Films')

@section('content')

    @can('create', new Starship())
    <a class="btn btn-success" href="{{ route('starships.create') }}">Create</a>
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
            <th>Starship class</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tenStarships as $starship)
            <tr>
                <td>{{ $starship->id }}</td>
                <td>{{ $starship->name }}</td>
                <td>{{ $starship->model }}</td>
                <td>{{ $starship->manufacturer }}</td>
                <td>{{ $starship->cost_in_credits }}</td>
                <td>{{ $starship->length }}</td>
                <td>{{ $starship->starship_class }}</td>
                <td><a class="btn btn-info" href="{{ route('starships.show', $starship->id) }}"><i class="fa-solid fa-eye"></i></a></td>
                @can('update', new Starship())
                <td><a class="btn btn-warning" href="{{ route('starships.edit', $starship->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$tenStarships->links()}}

@endsection

@extends('layouts.app')

@section('title',  'Star Wars - Films')

@section('content')

    @can('create', App\Models\Specie::class)
    <a class="btn btn-success" href="{{ route('species.create') }}">Create</a>
    <br><br>
    @endcan

    <table class="table table-dark">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Classification</th>
            <th>Average height</th>
            <th>Average lifespan</th>
            <th>Language</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tenSpecies as $specie)
            <tr>
                <td>{{ $specie->id }}</td>
                <td>{{ $specie->name }}</td>
                <td>{{ $specie->classification }}</td>
                <td>{{ $specie->average_height }}</td>
                <td>{{ $specie->average_lifespan }}</td>
                <td>{{ $specie->language }}</td>
                <td><a class="btn btn-info" href="{{ route('species.show', $specie->id) }}"><i class="fa-solid fa-eye"></i></a></td>
                @can('update', App\Models\Specie::class)
                <td><a class="btn btn-warning" href="{{ route('species.edit', $specie->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$tenSpecies->links()}}

@endsection

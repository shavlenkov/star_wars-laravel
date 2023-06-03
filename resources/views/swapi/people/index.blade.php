@extends('layouts.app')

@section('title',  'Star Wars - People')

@section('content')

    @can('create', App\Models\People::class)
    <a class="btn btn-success" href="{{ route('people.create') }}">Create</a>
    <br><br>
    @endcan

    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birth year</th>
            <th>Gender</th>
            <th>Homeworld</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tenPeople as $people)
            <tr>
                <td>{{ $people->id }}</td>
                <td>{{ $people->name }}</td>
                <td>{{ $people->birth_year }}</td>
                <td>{{ $people->gender }}</td>
                <td>{{ $people->planet->name }}</td>
                <td><a class="btn btn-info" href="{{ route('people.show', $people->id) }}"><i class="fa-solid fa-eye"></i></a></td>
                @can('update', App\Models\People::class)
                <td><a class="btn btn-warning" href="{{ route('people.edit', $people->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                @endcan

            </tr>
        @endforeach
        </tbody>
    </table>

    {{$tenPeople->links()}}

@endsection

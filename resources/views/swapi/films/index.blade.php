@extends('layouts.app')

@section('title',  'Star Wars - Films')

@section('content')

    @can('create', new Film())
    <a class="btn btn-success" href="{{ route('films.create') }}">Create</a>
    <br><br>
    @endcan

    <table class="table table-dark">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Episode Id</th>
            <th>Opening Crawl</th>
            <th>Release Date</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tenFilms as $film)
            <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->title }}</td>
                <td>{{ $film->episode_id }}</td>
                <td>{{ $film->opening_crawl }}</td>
                <td>{{ $film->release_date }}</td>
                <td><a class="btn btn-info" href="{{ route('films.show', $film->id) }}"><i class="fa-solid fa-eye"></i></a></td>
                @can('update', new Film())
                <td><a class="btn btn-warning" href="{{ route('films.edit', $film->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$tenFilms->links()}}

@endsection

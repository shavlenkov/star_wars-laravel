@extends('layouts.app')

@section('title',  'Star Wars - Planets')

@section('content')

    <h2>Create planets</h2>

    <form class="form-group" method="POST" action="{{ route('planets.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name:</label>
        <input class="form-control w-25" name="name" type="text" value="{{ old('name') }}" placeholder="Tatooine"/><br/><br/>
        <label for="rotation_period" class="form-label">Rotation Period:</label>
        <input class="form-control w-25 numberFormat" name="rotation_period" type="number" value="{{ old('rotation_period') }}" placeholder="23"/><br/><br/>
        <label for="orbital_period" class="form-label">Orbital Period:</label>
        <input class="form-control w-25 numberFormat" name="orbital_period" type="number" value="{{ old('orbital_period') }}" placeholder="304"/><br/><br/>
        <label for="diameter" class="form-label">Diameter:</label>
        <input class="form-control w-25 numberFormat" name="diameter" type="number" value="{{ old('diameter') }}" placeholder="10465"/><br/><br/>
        <label for="climate" class="form-label">Climate:</label>
        <input class="form-control w-25" name="climate" type="text" value="{{ old('climate') }}" placeholder="arid"/><br/><br/>
        <label for="gravity" class="form-label">Gravity:</label>
        <input class="form-control w-25" name="gravity" type="text" value="{{ old('gravity') }}" placeholder="1 standard"/><br/><br/>
        <label for="terrain" class="form-label">Terrain:</label>
        <input class="form-control w-25" name="terrain" type="text" value="{{ old('terrain') }}" placeholder="desert"/><br/><br/>
        <label for="surface_water" class="form-label">Surface Water:</label>
        <input class="form-control w-25 numberFormat" name="surface_water" type="number" value="{{ old('surface_water') }}" placeholder="1"/><br/><br/>
        <label for="population" class="form-label">Population:</label>
        <input class="form-control w-25 numberFormat" name="population" type="number" value="{{ old('population') }}" placeholder="200000"/><br/><br/>
        <label for="films" class="form-label">Films:</label>
        <select class="form-control w-25" id="films" name="films[]" multiple>
             @foreach(Film::all() as $film)
               <option>{{ $film->title }}</option>
            @endforeach
        </select><br/><br/>
        <button type="submit" class="btn btn-success">Создать</button>
</form>

@endsection

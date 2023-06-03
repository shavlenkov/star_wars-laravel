@extends('layouts.app')

@section('title',  'Star Wars - Species')

@section('content')

    <h2>Create species</h2>

    <form class="form-group" method="POST" action="{{ route('species.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name:</label>
        <input class="form-control w-25" name="name" type="text" value="{{ old('name') }}" placeholder="Human"/><br/><br/>
        <label for="classification" class="form-label">Classification:</label>
        <input class="form-control w-25" name="classification" type="text" value="{{ old('classification') }}" placeholder="mammal"/><br/><br/>
        <label for="average_height" class="form-label">Average Height:</label>
        <input class="form-control w-25 numberFormat" name="average_height" type="number" value="{{ old('average_height') }}" placeholder="180"/><br/><br/>
        <label for="skin_colors" class="form-label">Skin Colors:</label>
        <input class="form-control w-25" name="skin_colors" type="text" value="{{ old('skin_colors') }}" placeholder="caucasian, black, asian, hispanic"/><br/><br/>
        <label for="hair_colors" class="form-label">Hair Colors:</label>
        <input class="form-control w-25" name="hair_colors" type="text" value="{{ old('hair_colors') }}" placeholder="blonde, brown, black, red"/><br/><br/>
        <label for="eye_colors" class="form-label">Eye Colors:</label>
        <input class="form-control w-25" name="eye_colors" type="text" value="{{ old('eye_colors') }}" placeholder="brown, blue, green, hazel, grey, amber"/><br/><br/>
        <label for="average_lifespan" class="form-label">Average Lifespan:</label>
        <input class="form-control w-25 numberFormat" name="average_lifespan" type="number" value="{{ old('average_lifespan') }}" placeholder="120"/><br/><br/>
        <label for="language" class="form-label">Language:</label>
        <input class="form-control w-25" name="language" type="text" value="{{ old('language') }}" placeholder="Galactic Basic"/><br/><br/>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>

@endsection

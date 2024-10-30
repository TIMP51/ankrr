@extends('layouts.header')
@section('title')Жанры@endsection
@section('content')
    <h1>Add Genres to Film</h1>
    <form action="/films/{{ $film->id }}/genres" method="POST">
        @csrf
        <label for="genre_ids">Select Genres:</label>
        <select id="genre_ids" name="genre_ids[]" multiple required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Add Genres">
    </form>
@endsection

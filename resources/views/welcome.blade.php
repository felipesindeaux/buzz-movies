@extends('layouts.main')

@section('title', 'Create Movie')

@section('content')

@foreach($movies as $movie)
<p>{{ $movie -> name }}</p>
<video width="320" height="240" controls>
    <source src="/video/movies/{{ $movie->video }}">
    Seu navegador não suporta esse tipo de vídeo.
</video>
@endforeach

@endsection
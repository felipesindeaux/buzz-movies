@extends('layouts.main')

@section('title', 'Buzz Movies')

@section('content')

@foreach($movies as $movie)
<h3>{{ $movie->name }} ({{ $movie->size }}mb)</h3>
<video width="320" height="240" controls>
    <source src="/video/movies/{{ $movie->video }}">
    Seu navegador não suporta esse tipo de vídeo.
</video>
@endforeach
@if(count($movies) === 0)
    <h2>Não há filmes disponíveis!</h2>
@endif

@endsection
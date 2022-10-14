@extends('layouts.main')

@section('title', 'Buzz Movies')

@section('content')

<h2>Ordenar por:</h2>
<form action="/" method="GET">
    <button type="submit" value="asc" name="order">Crescente</button>
    <button type="submit" value="desc" name="order">Decrescente</button>
</form>

@foreach($movies as $movie)
<h3>{{ $movie->name }} ({{ $movie->size }}mb)</h3>
<p>Data de upload: {{ date('d/m/Y', strtotime($movie->created_at)) }}</p>
<video width="320" height="240" controls>
    <source src="/video/movies/{{ $movie->video }}">
    Seu navegador não suporta esse tipo de vídeo.
</video>
@endforeach
@if(count($movies) === 0)
    <h2>Não há filmes disponíveis!</h2>
@endif

@endsection
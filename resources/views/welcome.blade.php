@extends('layouts.main')

@section('title', 'Buzz Movies')

@section('content')

<h2>Ordenar por:</h2>
<form action="/" method="GET">
    <button type="submit" value="asc" name="order">Crescente</button>
    <button type="submit" value="desc" name="order">Decrescente</button>
</form>

@foreach($movies as $movie)
<a href="/movie/{{ $movie->id }}">{{ $movie->name }}</a>
@endforeach
@if(count($movies) === 0)
    <h2>Não há filmes disponíveis!</h2>
@endif

@endsection
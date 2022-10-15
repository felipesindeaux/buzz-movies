@extends('layouts.main')

@section('title', $movie->name)

@section('content')

<p>Nome: {{ $movie->name }}</p>
<p>Tamanho: {{ $movie->size }}mb</p>
<p>Data de upload: {{ date('d/m/Y', strtotime($movie->created_at)) }}</p>
<video width="320" height="240" controls>
    <source src="/video/movies/{{ $movie->video }}">
    Seu navegador não suporta esse tipo de vídeo.
</video>
<p>Criado por: {{ $movieOwner->name }}</p>
<form action="/movie/{{ $movie->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Deletar filme</button>
</form>

@endsection
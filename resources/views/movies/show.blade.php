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
Tags:
@foreach($movie->tags as $tag)
<span>{{ $tag->name }}</span>
@if($user && $movie->user_id === $user->id)
<form action="/movie/tags/remove/{{ $movie->id }}/{{ $tag->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Remover</button>
</form>
@endif
@endforeach
<p>Criado por: {{ $movieOwner->name }}</p>

@if($user && $movie->user_id === $user->id)
<a href="/movie/edit/{{ $movie->id }}">Editar filme</a>
<form action="/movie/{{ $movie->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Deletar filme</button>
</form>
@endif

@endsection
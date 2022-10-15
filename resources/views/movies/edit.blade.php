@extends('layouts.main')

@section('title', 'Editando filme')

@section('content')
@if ($user && $movie->user_id === $user->id)
<h1>Edição</h1>
<form action="/movie/update/{{ $movie->id }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Nome do filme:</label>
        <input type="text" name="name" placeholder="{{ $movie->name }}">
    </div>
    <button type="submit">Editar</button>
</form>
@else
<h1>Você não tem permissão para editar esse filme!</h1>
@endif

@endsection
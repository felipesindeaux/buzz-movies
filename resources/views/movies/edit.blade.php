@extends('layouts.main')

@section('title', 'Editando filme')

@section('content')
<h1>Edição</h1>
<form action="/movie/update/{{ $movie->id }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Nome do filme:</label>
        <input type="text" name="name" placeholder="{{ $movie->name }}">
    </div>

    <div>
        <label for="tags">Adicionar novas tags:</label>
        <input type="text" name="tags" placeholder="Terror Assustador">
    </div>

    <button type="submit">Editar</button>
</form>

@endsection
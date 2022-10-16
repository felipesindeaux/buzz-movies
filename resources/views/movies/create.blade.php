@extends('layouts.main')

@section('title', 'Create Movie')

@section('content')
<h1>Faça upload do seu filme</h1>
<form action="/movie" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nome do filme:</label>
        <input type="text" name="name" placeholder="Rei Leão">
    </div>
    <div>
        <label for="tags">Tags(separadas por espaços):</label>
        <input type="text" name="tags" placeholder="Terror Assustador Longo">
    </div>
    <div>
        <label for="video">Filme (max 5mb):</label>
        <input type="file" name="video">
    </div>
    <button type="submit">Fazer upload</button>
</form>
@endsection
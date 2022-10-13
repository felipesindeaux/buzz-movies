@extends('layouts.main')

@section('title', 'Create Movie')

@section('content')
<h1>Faça upload do seu filme</h1>
<form action="/movie" method="POST">
    @csrf
    <div>
        <label for="name">Nome do filme</label>
        <input type="text" name="name" placeholder="Nome do filme">
    </div>
    <button type="submit">Fazer upload</button>
</form>
@endsection
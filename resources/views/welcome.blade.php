@extends('layouts.main')

@section('title', 'Create Movie')

@section('content')

@foreach($movies as $movie)
    <p>{{ $movie -> name }}</p>
@endforeach

@endsection
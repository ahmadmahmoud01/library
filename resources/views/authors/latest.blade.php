@extends('layouts/app');

@section('title')

    Latest Authors

@endsection

@section('styles')

    <style>
        h1 {
            color: #AAA;
        }
        h2 {
            color: blueviolet;
        }
    </style>

@endsection

@section('content')

    <h1>Latest Authors</h1>

    @foreach($authors as $author)

    <hr>
    
    @if($author->img !== null)
        <img src='{{ asset("uploads/$author->img") }}' width="100" height="100">
    @endif

    <h2>{{ $author->id }}- {{$author->name }}</h2>


    @endforeach


@endsection


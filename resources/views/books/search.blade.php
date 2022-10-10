@extends('layouts/app');

@section('title')

    Search Result

@endsection

@section('content')    
    
    <h1>Search Results</h1>

    @foreach($book as $boo)

    <hr>
    @if($book->img !== null)
        <img src='{{ asset("uploads/$book->img") }}' width="100" height="100">
    @endif

    <h2>{{ $boo->name}}</h2>
    
    <p>{{ $boo->desc}}</p>

    <p>{{ $boo->price}}</p>

    @endforeach

@endsection
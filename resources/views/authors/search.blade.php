@extends('layouts/app');

@section('title')

    Search Result

@endsection

@section('content')    
    
    <h1>Search Results</h1>

    @foreach($author as $auth)

    <hr>
    @if($author->img !== null)
        <img src='{{ asset("uploads/$author->img") }}' width="100" height="100">
    @endif

    <h2>{{ $auth->name}}</h2>
    
    <p>{{ $auth->bio}}</p>

    @endforeach

@endsection
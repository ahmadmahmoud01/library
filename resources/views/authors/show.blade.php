@extends('layouts.app')

@section('title')

    Show Author - {{ $author->id }}

@endsection

@section('content')    
    
    <h1>{{ $author->name }}</h1>

    <p>{{ $author->bio }} </p>

    <h3>Books</h3>

    @foreach({{ $author->books as $b }}
        <a href="{{ route('showBook', $b->id)}}"></a>
            <p>{{ $b->name }}</p>
    @endforeach
    
    @if($author->img !== null)
        <img src='{{ asset("uploads/$author->img") }}' width="200" height="200">
    @endif

    <h1>{{ $author->name }}</h1>

    <p>{{ $author->bio }}</p>

    <small>{{ $author->created_at }}</small>

    <br><hr>
    <a href="{{ route('allAuthors') }}">Back To All</a>

@endsection
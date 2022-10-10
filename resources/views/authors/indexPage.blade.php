@extends('layouts.app')

@section('title')

    All Authors

@endsection

@section('styles')

    <style>
        h1 {
            color: #f50;
        }
    </style>

@endsection


@section('content')

    <div class="d-flex justify-content-between align-items-end">
        <h1>Hello Authors</h1>

        @auth
        <a href="{{ route('createAuthor') }}" class="btn btn-dark p-3 font-weight-bold">Add New</a>
        @endauth
    </div>

    @foreach($authors as $author)

        <hr>

        @if($author->img !== null)
            <img src='{{ asset("uploads/$author->img") }}' width="100" height="100">
        @endif

        <a href="{{ route('showAuthor', $author->id) }}">
            <h2>{{ $author->name }}</h2>
        </a>
        
        <p>{{ $author->bio }}</p>

        <a href="{{ route('showAuthor', $author->id) }}" class="btn btn-primary">Show</a>
        
        @auth
        <a href="{{ route('editAuthor', $author->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('deleteAuthor', $author->id) }}" class="btn btn-danger">Delete</a>
        @endauth

    @endforeach

    <div class="my-5">
        {!! $authors->render() !!}
    </div>

@endsection

    
    



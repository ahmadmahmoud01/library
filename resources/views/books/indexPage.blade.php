@extends('layouts.app')

@section('title')

    All books

@endsection

@section('styles')

    <style>
        h1 {
            color: brown;
        }
    </style>

@endsection



@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h1>All books</h1>

        @auth
        <a href="{{ route('createBook') }}" class="btn btn-danger">Add new</a>
        @endauth

    </div>
    @foreach($books as $book)

    <hr>

    @if($book->img !== null)
        <img src='{{ asset("uploads/$book->img") }}' width="100" height="100">
    @endif

    <a href="{{ route('showBook' , $book->id) }}">
        <h2>{{ $book->name }}</h2>
    </a>

    <p>{{ $book->desc}}</p>
    <p>{{ $book->price}}</p>

    <a href="{{ route('showBook', $book->id) }}" class="btn btn-primary">Show</a>

    @auth
    <a href="{{ route('editBook', $book->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('deleteBook', $book->id) }}" class="btn btn-danger">Delete</a>
    @endauth

    @endforeach

    <div class="my-5">
        {!! $books->render() !!}
    </div>

@endsection

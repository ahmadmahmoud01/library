@extends('layouts.app');

@section('title')

    Show Book - {{ $book->id }}

@endsection

<!-- @section('content') -->
    
    <!-- <h1>{{ $book->name }}</h1>

    <p>{{ $book->desc }} </p>

    <p>$ {{ $book->price }} </p> <br> -->

      <!-- <p>By: 
        <a href="{{ route('showAuthor', $book->author->id) }}">
            {{ $book->author->name }}
        </a> -->
    <!-- </p> -->

    <!-- @if($book->img !== null)
        <img src='{{ asset("uploads/$book->img") }}' width="300" height="300">
    @endif  -->

    <!-- <p>{{ $book->created_at }}</p><br> -->

    <!-- <a href="{{ route('allBooks') }}">Back To All books Page</a> -->

<!-- @endsection  -->



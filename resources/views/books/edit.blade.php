@extends('layouts.app');

@section('title')

    Edit book - {{ $book->id }}

@endsection

@section('content')

    @include('inc/errors')

    <form method="POST" action="{{ route('updateBook', $book->id) }}" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name" value='{{ $book->name}}'>
        </div>

        <div class="form-group">
            <textarea class="form-control" rows="6" name="desc" placeholder="Description">{{ $book->desc }}</textarea>
        </div>
        
        <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $book->price }}">
        </div>

        <select class="form-control" name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" 
                    @if ( $author->id == $book->author_id ) selected @endif >
                    {{ $author->name }} 
                </option>
            @endforeach
        </select>

        @if($book->img !== null)
            <img src='{{ asset("uploads/$book->img") }}' width="100" height="100">
        @endif
        
        <div class="form-group mt-3">
            <input type="file" class="form-control-file" name='img'>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>

    <a href="{{ route('allBooks') }}" class="btn btn-primary mt-5">Back To All</a>

@endsection
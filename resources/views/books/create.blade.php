@extends('layouts.app');

@section('title')

    Create Book

@endsection

@section('content')
    
    @include('inc.errors')

    <form method="POST" action="{{ route('storeBook') }}" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name">
        </div>

        <div class="form-group">
            <textarea class="form-control" rows="6" name="desc" placeholder="Description"></textarea>
        </div>
        
        <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="Price">
        </div>

        {{-- <select class="form-control" name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select> --}}


        <div class="form-group mt-3">
            <input type="file" class="form-control-file" name='img'>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        
    </form>

@endsection
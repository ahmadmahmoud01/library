@extends('layouts.app')

@section('title')

Login

@endsection

@section('content')

    @include('inc.errors')

    <form method="POST" action="{{ route('doLogin') }}" class="pt-5">

        @csrf

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="email">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>


@endsection
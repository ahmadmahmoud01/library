@extends('layouts.app')



@section('content')


    <form id="msgForm">

        @csrf

        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name">
        </div>

        <div class="form-group">
            <textarea class="form-control" rows="3" name="msg" placeholder="message"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
            
    </form>

@endsection



@section('scripts')

<script>

    $('#msgForm').submit(function(e){

        e.preventDefault();
        let msgData = new FormData($('#msgForm')[0]);

        console.log(msgData.get('name'));
    })

</script>


@endsection
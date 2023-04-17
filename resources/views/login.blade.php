@extends('nav')

@section('content')

<div class="card mx-auto my-4 shadow-sm col-4 px-2">
    <h4 class="mx-auto text-center my-2">Login</h4>
    <form action="/login" method="POST">
        @csrf

        @if(isset($message))
        @if($check)
            <div class="w-100 px-2 alert alert-success shadow">{{$message}}</div>
        @else
            <div class="w-100 px-2 alert alert-danger shadow">{{$message}}</div>
        @endif
        @endif

       
        <div class="form-group my-2">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email"> 
        </div>
        <div class="form-group my-2">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password"> 
        </div>
        <div class="form-group my-2">
            <button class="btn btn-sm bg-info px-3 text-light">Login</button>
        </div>
    </form>
</div> 
@endsection
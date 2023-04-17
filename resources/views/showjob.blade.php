@extends("nav")


@section("content")

<div class="card col-md-6 px-2 py-1 mt-3">
    <div class="d-flex my-2" >
     
   
        <p class="fs-3 fw-bold my-2">{{$job->job_title}}</p>
        <form action="/jobs/{{$job->id}}" method="post">
            @method("DELETE")
            @csrf
            <button class="btn btn-md btn-danger">Delete</button>
        </form>
    </div>
    <p class="my-1">{{$job->job_desc}}</p>
    <p class="my-1">{{$job->job_requirement}}</p>
    <p class="my-1">{{$job->location}}</p>
    <a class="my-1">Apply here - {{$job->link}}</a>
    
</div>


@endsection
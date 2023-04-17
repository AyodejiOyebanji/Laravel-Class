@extends('nav')

@section('content')
  @if (!isset($me))
  <a href="/list/me" >Show All Jobs</a> 
  
  @endif

     @if(isset($message))
     <div class="alert alert-{{$delete? 'success' :danger}} w-100 py-2">
      {{$message}} 
  </div>
  @endif
<table class="table">
    <thead>
      <tr>
       
        <th scope="col">Job Title</th>
        <th scope="col">Job Description </th>
        <th scope="col">Job Requirement</th>
        
        <th scope="col">Action</th>
        <th scope="col">Action</th>
        <th scope="col">Action</th>
        <th scope="col">Posted By</th>
      </tr>
    </thead>
    <tbody>
       @isset($jobs)
            @foreach ($jobs as $job)
            
                <tr   >
                  <td>{{$job->job_title}}</td>
                  <td>{{$job->job_desc}}</td>
                  <td>{{$job->job_requirement}}</td>
                  
                  <td><a href="/jobs/{{$job->id}}">View details</a></td>
                  <td><a href="/jobs/{{$job->id}}/edit">Edit</a></td>
                  <td><a href="/jobs/{{$job->id}}">Delete</a></td>
                  <td>{{$job->name}}</td>
                 
                </tr>

          @endforeach

        @endisset
        
      
    </tbody>
  </table>


@endsection
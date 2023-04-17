@extends('nav')

@section("content")

<div class="mx-auto col-md-6 card shadow-sm p-3">
    @if (isset($message)){
        <div class="alert alert-{{$save ? "success" : "danger"}} w-100 py-2"> {{$message}}</div>
    }
    @endif
    <form action=" /jobs" method="POST">
        @csrf
        <div class="form-group my-2">
            <label for="">Job Title</label>
            <input type="text" class="form-control" name="job_title" placeholder="Job title">
    
        </div>
        @if ($errors->get('job_title')!==null)
            <p class="text-sm text-danger">{{$errors->first("job_title")}}</p>
        
            
        @endif
        

      
        <div class="form-group my-2">
            <label for="">Job Description</label>
            <textarea type="text" class="form-control" name="job_desc" placeholder="Job title"></textarea>
    
        </div>
        @if  ($errors->get('job_desc')!==null)
            <p class="text-sm text-danger">{{$errors->first("job_desc")}}</p>
        
            
        @endif
        <div class="form-group my-2">
            <label for="">Job Requirement</label>
            <textarea type="text" class="form-control" name="job_requirement" placeholder="Job title"></textarea>
    
        </div>
        @if  ($errors->get('job_requirement')!==null)
        <p class="text-sm text-danger">{{$errors->first("job_requirement")}}</p>
    
        
    @endif
        <div class="form-group my-2 " >
            <label for="">Job Type</label>
           <select name="job_type" id="" class="form-select">
            <option value="Remote">Remote</option>
            <option value="Hybrid"> Hybrid</option>
            <option value="Onsite">Onsite</option>
           </select>
    
        </div>
        @if ($errors->get('job_type')!==null)
        <p class="text-sm text-danger">{{$errors->first("job_type")}}</p>
    
        
    @endif
        <div class="form-group my-2">
            <label for="">Job Location</label>
            <textarea type="text" class="form-control" name="location" placeholder="Job location"></textarea>
    
        </div>
        @if ($errors->get('location')!==null)
        <p class="text-sm text-danger">{{$errors->first("location")}}</p>
    
        
    @endif
        <div class="form-group my-2">
            <label for="">Application link</label>
            <textarea type="text" class="form-control" name="link" placeholder="Application link"></textarea>
    
        </div>
        @if ($errors->get("link")!==null)
        <p class="text-sm text-danger">{{$errors->first("link")}}</p>
    
        
    @endif
        <button class="btn btn-primary" type="submit">Post job</button>
    </form>

</div>

@endsection
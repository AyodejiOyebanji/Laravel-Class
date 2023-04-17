<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class jobscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    return view('dashboard');
    // $jobs= Jobs::get();
        $jobs= Jobs::join("users", 'jobs.users_id','users.id')->get();
         return view('dashboard')->with('jobs',$jobs);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("postjobs");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "job_title" => "required|max:50|min:5",
            "job_desc" => "required|max:50|min:5",
            "job_requirement"=>"required",
            "job_type"=>"required",
            "location"=>"required",
            "link"=>"required|url",

        ]);
        if($validator->fails()){
            // return  $validator->errors();
            return view('postjobs')->with('errors', $validator->errors());
           

        }else{
            
            $jobs = new Jobs;
            $jobs->job_title = $request->job_title;
            $jobs->job_desc = $request->job_desc;
            $jobs->job_requirement = $request->job_requirement;
            $jobs->job_type= $request->job_type;
            $jobs->location = $request->location;
            $jobs->link = $request->link;
            $jobs->users_id = Auth::user()->id;
        
            
            $save = $jobs->save();
           if($save){
            return view("postjobs")->with("message", "Jobs Listening created")->with("save", true);
            
        }else{
            return view("postjobs")->with("message", "Jobs Listening created")->with("save", false);
            
           }

        }

        

    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $job = Jobs::where('id',$id)->first();
      if ($job) {
        
          return view('showJob')->with('job',$job);
      }else{
        return "Job not found";
      }

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Jobs::where('id', "=", $id)->first();
        return view("editjob")->with("job", $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    { 
     
       $job = Jobs::where('id', $id)->update([
        "job_title" => $request->job_title,
        "job_desc" => $request->job_desc,
        "job_requirement"=> $request->job_requirement,
         "job_type" => $request->job_type,
         "location" => $request->location,
         "link" => $request->link,
         
       ]);
       return redirect('/jobs');
        
      
        
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job= Jobs::where('id', $id)->first();
        $jobs= Jobs::get();
        if($job->users_id==Auth::user()->id){
            $delete = Jobs::where('id',$id)->delete();
            return view("dashboard")->with("message", "Job has been deleted successfully")->with('delete',true)->with('jobs', $jobs);
        }else{
            return redirect("/jobs")->with("message", "You cannot delete this message ")->with('jobs', $jobs);
        }
    }


    public function showUserJobs(){
        // $jobs = Jobs::where('users_id', Auth::user()->id)->get();
        // return view("dashboard")->with('jobs',$jobs)->with('me',false);
        $jobs= User::find(Auth::user()->id)->jobs;
        return  $jobs;
    } 
}

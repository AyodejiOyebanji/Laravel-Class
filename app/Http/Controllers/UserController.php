<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{       
    // public $myName = "Ayodeji";
    public function index()
    {
        // $user ="Ayodeji Oyebanji";
        // $school="SCICT";
        // $data= [
        //     'name'=>"Seyi Makinde",
        //     'State'=>'Oyo State',

        // ];
        // return view('home', compact('user','school',));
            // return view('home', compact('myName'))  ;
        // return view('home', compact('data'));
        //or
        return view("home")->with('insert',false);
      

} 


    public function register(Request $req){
        $check = DB::table('users')->where ('email',$req->email)->first();
        if(!$check){
            $insert =DB::table("users")->insert([
                "name"=>$req->name,
                "email"=>$req->email,
                "password"=>password_hash($req->password, PASSWORD_DEFAULT) ,
                "created_at"=>now(),
            ]);
            if ($insert) {
                // return view('home')->with('message', 'Registration successful')->with('insert', $insert);
                return view('login');
            }else{
                return view('home')->with('message', 'Registration Unsuccessful ')->with('insert', $insert);

            }

        }else{
            return view('home')->with('message', 'User Already exist ')->with('insert', false);
        }

    }

    public function login(Request $req){
        $email = $req->email;
        $password = $req->password;
        $check = DB::table('users')->where('email', $email)->first();
        if($check){
            if(password_verify($password,$check->password)){
                return redirect('/jobs');
            }else{
                return view ("login")->with("message","Password ot correct")->with("check",false);
            }
        }else {
            return view('login')->with ("message",'Email is not registered ')->with("check", false);
        }

    }

    
}

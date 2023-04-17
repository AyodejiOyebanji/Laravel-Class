<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\jobscontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, "index"]);
Route::Post('/register', [UserController::class,"register"]);
Route::get('/login', function (){
    return view('login');
});
Route::Post("/login", [UserController::class, "login"]);
// Route::get('/dashboard', function (){
//     return view('dashboard');
// });
Route::resource("/jobs", jobscontroller::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/list/me', [jobscontroller::class, "showUserJobs"]);
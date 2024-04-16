<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
 
  Route::get('/',[HomeController::class,'index']);

  Route::group([],function(){

  Route::group(['middleware' => 'guest'], function(){
    Route::get('/account/registration',[AccountController::class,'registration']);
    Route::get('/account/login',[AccountController::class,'login'])->name('account.login'); // login view
    Route::post('/account/process-register',[AccountController::class,'processRegistration']);// registration
    Route::post('/account/process-login',[AccountController::class,'processLogin']); // login
  });

  Route::group(['middleware' => 'auth'], function(){
    Route::get('/account/profile',[AccountController::class,'profile'])->name('account.profile'); // account profile
    Route::post('/account/updateprofile/{id}',[AccountController::class,'profileupdate'])->name('account.updateprofile'); //update Profile
    Route::post('/account/updateimage/{id}',[AccountController::class,'imageupdate'])->name('account.updateimage'); // update image
//    Route::get('/account/jobpost',[AccountController::class,'jobpost']);
    Route::get('/create-job',[AccountController::class,'createJob']); // job form
    Route::post('/save-job',[AccountController::class,'saveJob']); // add job
    Route::get('/account/logout',[AccountController::class,'logout']);
     Route::get('/jobedit/{id}',[AccountController::class,'jobsedit']); 
     Route::post('/jobupdate/{id}',[AccountController::class,'updatejob']); // user edit page show
     Route::get('/my-jobs',[AccountController::class,'myJobs']);
  });
});

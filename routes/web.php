<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,"home"]);



Route::name('user.')->group(function(){
    Route::view('/private','log_in/private')->middleware(middleware: 'auth')->name(name:'private');
   
   
    Route::get('/login',function(){
       if(Auth::check()){
           return redirect(route(name:'user.private'));
       }
       return view(view:'log_in/login');
    })->name(name:'login');
   
   
    Route::post('login',[\App\Http\Controllers\LoginController::class,'login']);
   
   
   
    Route::get('/logout',function(){
        Auth::logout();
        return redirect('/');
    });
    
    Route::get('/register',function(){
       if(Auth::check()){
           return redirect(route(name:'user.private'));
       }
       return view(view:'log_in/register');
    })->name(name:'register');
   
    Route::post('/register',[\App\Http\Controllers\RegisterController::class,'save']);
   
   });
   

   Route::prefix('auth')->group(function(){
       Route::get("/google",[AuthorizationController::class,'continueWith'])->name('google');
       Route::get("/google/callback",[AuthorizationController::class,"registartionOrLoginWith"])->name('google');


       Route::get("/git",[AuthorizationController::class,'continueWith'])->name('github');
       Route::get("/git/callback",[AuthorizationController::class,"registartionOrLoginWith"])->name('github');


       Route::get("/link",[AuthorizationController::class,'continueWith'])->name('linkedin');
       Route::get("/link/callback",[AuthorizationController::class,"registartionOrLoginWith"])->name('linkedin');
   });

Route::get('/alertCreate', function(){
    return view('ClientPages.CreateAlert');
});
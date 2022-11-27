<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\EmailVerificationPromptController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



use App\Models\Tag;

use Illuminate\Http\Request;

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


Route::name('alerts.')->group(function(){
    Route::get('/create',[AlertController::class,"create"])->middleware(['auth', 'verified'])->name(name:'create');

     Route::post('/store',[AlertController::class,"store"])->middleware(['auth', 'verified'])->name(name:'store');

     Route::get('/index/{id}',[AlertController::class,"show"])->middleware(['auth', 'verified'])->name(name:'show');

     Route::get('/index',[AlertController::class,"index"])->middleware(['auth', 'verified'])->name(name:'index');
  
     Route::post('/destroy/{id}',[AlertController::class,"destroy"])->middleware(['auth', 'verified'])->name(name:'destroy');

     Route::get('/index/{id}/edit',[AlertController::class,"edit"])->middleware(['auth', 'verified'])->name(name:'edit');

     Route::post('/index/{id}/update',[AlertController::class,"update"])->middleware(['auth', 'verified'])->name(name:'update');


});


Route::name('user.')->group(function(){
  
    Route::get('/login',function(){
       if(Auth::check()){
           return redirect(route(name:'alerts.index'));
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
           return redirect(route(name:'alerts.index'));
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



Route::get('/alertDetails', function(){
    return view('ClientPages.AlertDetail');
});
Route::get('/alertEdit', function(){
    $tags = Tag::all();
    return view('alerts.edit');
});

   

   Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

});


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return redirect('/verify-email');
})->middleware('auth')->name('verification.notice');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

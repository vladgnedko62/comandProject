<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

class AuthorizationController extends Controller
{

    public function registartionOrLoginWith()
    {
        $id_name = "";
     
        $uri = Route::currentRouteName();
        $user = Socialite::driver($uri)->stateless()->user();
         
        $user_name = $user->name;
         
       if($user->name==NULL){
           $user_name = $user->nickname;
       }


        if($uri=='google')$id_name="google_id";
        else if($uri=='github')$id_name="github_id";
        else if($uri=='linkedin')$id_name="linkedin_id";

        $isUser = User::where($id_name,$user->id)->first();

        $isMail = User::where('email',$user->email)->first();

        if($isUser){
            Auth::login($isUser);
            return redirect('/');
        }
        else if($isMail){
            if($id_name=="google_id"){
                $isMail->google_id = $user->id;
            } 
            else if($id_name=="github_id"){
                $isMail->github_id = $user->id;
            } 
            else if($id_name=="linkedin_id"){
                $isMail->linkedin_id = $user->id;
            } 
              $isMail->save();
            Auth::login($isMail);
 

        }
        else{
            $createUser = User::create([
                'name' => $user_name,
                'email' => $user->email,
                $id_name => $user->id,
                'password' => encrypt('user')
            ]);


            Auth::login($createUser);

                 return redirect('/');
        }
        return redirect('/');
       
        
    }



     public function continueWith(){
        $uri = Route::currentRouteName();
        return Socialite::driver($uri)->stateless()->redirect();
     }
 
    




}

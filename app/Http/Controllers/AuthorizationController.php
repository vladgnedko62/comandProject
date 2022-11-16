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
         
      
         
       if($user->name==NULL){
        return redirect()->to(route(name:'user.login'))->withErrors([
            'name' => "Pick Name"
        ]);
       }


        if($uri=='google')$id_name="google_id";
        else if($uri=='github')$id_name="github_id";

        $isUser = User::where($id_name,$user->id)->first();



        if($isUser){
            Auth::login($isUser);

            return redirect('/');
        }
        else{
            $createUser = User::create([
                'name' => $user->name,
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

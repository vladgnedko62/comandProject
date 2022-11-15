<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class AuthorizationController extends Controller
{
    public function continueWithGoogle()
    {
        return Socialite::driver("google")->stateless()->redirect();
    }
    public function registartionOrLoginWithGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();

        
    }
    public function continueWithGitHub()
    {
        return Socialite::driver("github")->stateless()->redirect();
    }
    public function registartionOrLoginWithGitHub()
    {
        $user = Socialite::driver('github')->stateless()->user();
        
        dd($user);
    }
}

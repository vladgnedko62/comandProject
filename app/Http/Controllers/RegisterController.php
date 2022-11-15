<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function save(Request $req){
        if(Auth::check()){
            return redirect(route(name:'user.private'));
        }


        $validateFields = $req->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|same:password_check'
        ]);





      if(User::where('email',$validateFields['email'])->exists()){
        return redirect()->to(route(name:'user.register'))->withErrors([
            'email' => "All Ready Exist"
        ]);
      }


        $user = User::create($validateFields);

     
        if($user){
         
            Auth::login($user);
            return redirect()->to(route(name:'user.login'));
        }

        return redirect()->to(route(name:'user.login'))->withErrors([
            'formError' => "Error"
        ]);


    }
}

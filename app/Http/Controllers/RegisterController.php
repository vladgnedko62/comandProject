<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;



class RegisterController extends Controller
{
    public function save(Request $req){
        if(Auth::check()){
            return redirect(route(name:'alerts.index'));
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
    
        event(new Registered($user));


        if($user){
         
            Auth::login($user);
    
            return redirect('/email/verify');
        }

        return redirect()->to(route(name:'user.login'))->withErrors([
            'formError' => "Error"
        ]);


    }
}

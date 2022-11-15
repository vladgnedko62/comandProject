<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req){
        if(Auth::check()){
          return redirect('/');
        }
    
  
  
  
       $formFields = $req->only(['email','password']);
   
       if(Auth::attempt($formFields)){
          return redirect()->intended(route(name:'user.private'));
       }
       
  
       return redirect()->to(route(name:'user.login'))->withErrors([
          'formError' => "Не удалось авторизоваться"
      ]);
  
     }
}

<?php

namespace App\Http\Controllers;


use App\Models\Alerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AlertController extends Controller
{
    public function index(){
        $alerts = Alerts::all()->where('user_id',Auth::user()->id);
        return view('alerts.index',compact('alerts'));
        
    }

    public function create(){
        return view('alerts.create');
   }



}

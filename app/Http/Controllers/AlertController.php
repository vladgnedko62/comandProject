<?php

namespace App\Http\Controllers;


use App\Models\Alerts;
use App\Models\Images;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class AlertController extends Controller
{
    public function index(){
        $alerts = Alerts::all()->where('user_id',Auth::user()->id);
        return view('alerts.index',compact('alerts'));
        
    }

    public function create(){
        $tags = Tag::all();

        return view('alerts.create',compact('tags'));
   }

   public function store(Request $req){
    
     $alert = new Alerts();

     $alert->alert = $req->get("alertName");
     $alert->tag_id = $req->get("tag");
     $alert->user_id = Auth::user()->id;
     $alert->start_date =  $req->get("startDate");
     $alert->end_date =  $req->get("endDate");
     $alert->complete = false;
     $alert->created_at = new DateTime();

     $alert->save();


     for($i=1;$i<=3;$i++){
        $image =  new Images();

        if($req->file('image'. $i) !=null){
        $name = $req->file('image'. $i )->getClientOriginalName();
     
      $req->file('image' . $i)->storeAs('public/images/',$name);

      $image->image = $name;
      $image->alert_id = $alert->id; 
      $image->created_at = new DateTime();
    
     
      $image->save();
    }
     }

    //     $image =  new Images();

    //     $name = $req->file('image1')->getClientOriginalName();
     
    //   $req->file('image1')->storeAs('public/images/',$name);

    //   $image->image = $name;
    //   $image->alert_id = $alert->id; 
    //   $image->created_at = new DateTime();
    
    
    //     
    

 
        
    return redirect("/private");
   }



}

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
        $data["alerts"] = Alerts::all()->where('user_id',Auth::user()->id)->where('complete',0);
        $data["compalerts"] = Alerts::all()->where('user_id',Auth::user()->id)->where('complete',1);
        $data["images"] = Images::all()->unique('alert_id');
        $data["tags"] = Tag::all();

        return view('alerts.index',compact('data'));
        
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


 
        
    return redirect("/private");
   }


   public function show($id){
     $data['alert'] = Alerts::find($id);
     $data['images'] = Images::all()->where("alert_id",$id);
     $data['isActive'] = false;
     return view('alerts.show',compact('data'));
}

public function destroy($id){
  $alert = Alerts::find($id);
  $images = Images::all()->where("alert_id",$id);

  $alert->delete();
  foreach($images as $st){
    $st->delete();
  }

  return redirect(route('alerts.index'));

}



}

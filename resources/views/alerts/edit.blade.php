@extends('layout/layout')
@section('head')
<link rel="stylesheet" href="/css/login.css" type="text/css">
<link rel="stylesheet" href="/css/addAlert.css" type="text/css">
<link rel="stylesheet" href="./css/animate.css" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<title>Confirming</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endSection
@section('content')
<div class="mainBanner">
    <div class="banner">
        <div class="navbar animated fadeInDown">
                    <img src="/images/logoMain.png" class="logo" onclick="javascript:location.href='/'">                    
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/login">Log in</a></li>       
            </ul> 
        </div>
        <div class="back">
            <h2>Create Alert</h2>
        <form style="display:flex;flex-direction:column" method="post" action="{{route('alerts.update',$data['alert']->id)}}" enctype="multipart/form-data"x>
              @csrf
              <input type="text" required name="alertName" value="{{$data['alert']->alert}}" placeholder="Input alert name">
              <p for="startDate">Edit images(max-3)</p>
              <div class="images">
                <li><input class="form-control form-control-sm" type="file"  name="image1"></li>
              </div>
              <p for="startDate">Start date</p>
              <input class="dateI" type="datetime-local" value="{{$data['alert']->start_date}}" required name="startDate" >
              <p for="startDate">End date</p>
              <input class="dateI" type="datetime-local" value="{{$data['alert']->end_date}}" required name="endDate" >
              <p for="tag">Select tag</p>
              <select name="tag" selected="{{$data['alert']->tag_id}}">
              @foreach($data['tags'] as $tag)
              
                    @if($tag->id == $data['alert']->tag_id)
                    <option selected="selected" value="{{$tag->id}}">{{ $tag->name }}</option>
              
                    @else  <option value="{{$tag->id}}">{{ $tag->name }}</option>
                    @endif
                @endforeach
              </select>
              <button class="btn btn-5"><span></span>Edit alert</button> 

              </form>
        </div>
    </div>
    <section id="logFooter" class="footer" >
        <div class="social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-snapchat"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">
            Future Coders @ 2021
        </p>
    </section>
</div>
<script>
    initLi();
    function initLi() {
        let li = document.querySelectorAll('.back .images li');
        let ul = document.querySelectorAll('.back .images');
        let i = 0;
        console.log(li);  
        li.forEach(el => {
            i++;
            el.addEventListener('change', ()=>{   
                console.log(i);      
                if (i < 3) {
                    let new_node = document.createElement("div");
                    new_node.className="images";
                    new_node.innerHTML = '<li><input class="form-control form-control-sm" type="file"  name="image'+(i+1)+'"></li>';
                    ul[ul.length-1].parentNode.insertBefore(new_node, ul[ul.length-1].nextSibling);
                    initLi();
                }
            });
        });
    }
</script>
@endsection
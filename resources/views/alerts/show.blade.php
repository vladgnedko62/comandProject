@extends('layout/layout')
@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="/css/login.css" type="text/css">
<link rel="stylesheet" href="/css/details.css" type="text/css">
<title>Details</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endSection
@section('content')
<div class="mainBanner">
    <div class="banner">
        <div class="navbar animated">
            <img src="/images/logoMain.png" class="logo" onclick="javascript:location.href='/'">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Notifications</a></li>
                @if(Auth::user()!=null)
                <li><a href="/login">{{Auth::user()->name}}</a></li>
                @else
                <li><a href="/login">Log in</a></li>
                @endif
            </ul>
        </div>
        <div class="block">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                @foreach($data['images'] as $image)

                 @if($data['isActive']==true)
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/'.$image->image)}}" class="d-block w-100">
                    </div>
                 @endif
                 
                  @if($data['isActive']==false)
                    <div class="carousel-item active">
                        <img src="{{asset('storage/images/'.$image->image)}}" class="d-block w-100">
                    </div>
                    {{$data['isActive'] = true}}
                  @endif
           
                 @endforeach

                </div>
                <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="infoblock">
                <h1>Alert name</h1>
                <p>Tag: qwe</p>
                <p>12.10.2021 - 20.12.2022</p>
                
                <div>
                    <a href="/alertEdit" class="btnm"><span></span>Edit</a>
                    <form action="{{ route('alerts.destroy', $data['alert']->id)}}" method="post">

@csrf

@method('post')

<button class="btnm" type="submit">Delete</button>
</form>
                </div>          
            </div>
        </div>   
    </div>
    <section id="logFooter" class="footer">
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

@endsection
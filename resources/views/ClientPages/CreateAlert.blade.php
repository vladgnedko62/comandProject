@extends('layout/layout')
@section('head')
<link rel="stylesheet" href="./css/login.css" type="text/css">
<link rel="stylesheet" href="./css/addAlert.css" type="text/css">
<!-- <link rel="stylesheet" href="./css/animate.css" type="text/css"> -->
<title>Confirming</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endSection
@section('content')
<div class="mainBanner">
    <div class="banner">
        <div class="navbar animated">
                    <img src="images/logoMain.png" class="logo" onclick="javascript:location.href='/'">                    
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="/login">Log in</a></li>       
            </ul> 
        </div>
        <div class="back">
        <form style="display:flex;flex-direction:column"  method="post" action="{{route('user.register')}}">
              @csrf
              <input type="text" required name="alertName" placeholder="Input alert name">
              <input type="file" required name="alertName" placeholder="Input alert name">
              <p for="startDate">Input start date</p>
              <input class="dateI" type="datetime-local" required name="startDate" placeholder="Input Name">
              <p for="startDate">Input end date</p>
              <input class="dateI" type="datetime-local" required name="endDate" placeholder="Input Password">
              <select name="tag">
                <option value="qwe">qwe</option>
                <option value="qwe">qwe</option>
                <option value="qwe">qwe</option>
              </select>
              <button class="btn btn-5"><span></span>Sign In</button> 

              </form>
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
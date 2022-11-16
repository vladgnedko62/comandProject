
@extends('layout/layout')
@section('head')
<link rel="stylesheet" href="./css/login.css" type="text/css">
<link rel="stylesheet" href="./css/animate.css" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<title>Login</title>
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
        <div class="back animated">
          <h2>Login in Your Account</h2>
          <form id="joinForm" method="post" action="{{route('user.login')}}">
          @csrf
          @error('formError')
            <label style="color: red;"> {{$message}}</label>
            <br>
          @enderror
          <p>Login using sozial networks</p>
          <a id="intoG" href="#"><i class="fab fa-google"></i></a>
          <a id="intoG" href="#"><i class="fab fa-linkedin"></i></a>
          <a id="intoG" href="#"><i class="fab fa-github"></i></a>

          <h1><span>or</span></h1>

          <input type="email" require name="email" placeholder="Input Email">
          <input type="password" require name="password" placeholder="Input Password">
          <a href="#" onclick="document.getElementById('joinForm').submit()" class="btn btn-5"><span></span>Sign In</a> 

          </form>
          
          <p class="userN">New user? <a id="reg" href="/register">Register</a></p>
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
    <script src="jsFiles/loginPageAnim.js"></script>
@endsection
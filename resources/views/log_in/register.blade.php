
@extends('layout/layout')
@section('head')
<link rel="stylesheet" href="./css/login.css" type="text/css">
<link rel="stylesheet" href="./css/animate.css" type="text/css">
<title>Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endSection
@section('content')
<div class="mainBanner">
<div class="banner">
        <div class="navbar animated">
            <img src="images/logoMain.png" class="logo" onclick="javascript:location.href='/'">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/login">Log in</a></li>
            </ul>
        </div>
        <div class="back animated">
          <h2>Registration</h2>
          <p>Registration using social networks</p>
          <a id="intoG" href="/auth/google"><i class="fab fa-google"></i></a>
          <a id="intoG" href="/auth/link"><i class="fab fa-linkedin"></i></a>
          <a id="intoG" href="/auth/git"><i class="fab fa-github"></i></a>
          <h1><span>or</span></h1>
          <form style="display:flex;flex-direction:column"  method="post" action="{{route('user.register')}}">
              @csrf
              <input type="email" required name="email" placeholder="Input Email">
              @error('email')
                <label> {{$message}}</label>
              @enderror
              <input type="text" minlength="3" maxlength="20" required name="name" placeholder="Input Name">
              @error('name')
                <label> {{$message}}</label>
              @enderror
              <input type="password" minlength="6" maxlength="15" required name="password" placeholder="Input Password">
              @error('password')
                <label> {{$message}}</label>
              @enderror
              <input type="password" minlength="6" maxlength="15" required name="password_check" placeholder="Repeat Password">
              <button class="btn btn-5"><span></span>Register</button> 

              </form>
  
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
    <script src="jsFiles/loginPageAnim.js"></script>
@endsection



@extends('layout/layout')
@section('head')
<link rel="stylesheet" href="./css/animate.css" type="text/css">
<title>Home</title>
<link rel="stylesheet" href="./css/home.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endSection
@section('content')

    <div class="banner">
        <div class="navbar animated fadeInDown">
            <img src="images/logoMain.png" class="logo" onclick="javascript:location.href='/'">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Tarifs</a></li>
                @if(Auth::user()!=null)
                    <li><a href="/login">{{Auth::user()->name}}</a></li>
                @else
                    <li><a href="/login">Log in</a></li>
                @endif       
            </ul>
        </div>
        <div class="content">
            <h1>Your notifications assistant</h1>
            <p>Manage your notifications.</p>
            <div class="buttons">
                <a href="#howflag" class="btn btn-5 animated zoomIn"><span></span>ABOUT US</a>
                <a id="startBttn" href="/login" class="btn btn-5 animated zoomIn "><span></span>START</a>
            </div>
        </div>
    </div>
    <a id="howflag"></a>
    <div class="part2">  
        <div class="About">
            <img src="images/logoAbout.png" class="clock">
            <div class="vl"></div>
            <p>We are creator of this web-site. We hope that our solution will bring you convenience and benefit. Enjoy using!</p>
        </div>
        <h1>We provide</h1>
        <div class="blockAbout">
            <div class="columns animated ">
                <img src="images/sofa.png" class="plusImg">
                <div class="aboutUs">
                    <h2>Convenience</h2>
                    <span>We paid maximum attention to the interface, it turned out to be clean and easy, but at the same time focuses on the main task - reminders.  </span>               
                </div>
            </div>
            <div class="columns animated ">
                <img src="images/clocks.png" class="plusImg">
                <div class="aboutUs">
                    <h2>Time</h2>
                    <span>With our task manager you can regulate your plans, sort them, see future and completed ones. Thereby saving your time.</span> 
                </div>
            </div>
            <div class="columns animated">
                <img src="images/guarantee.png" class="plusImg">
                <div class="aboutUs">
                    <h2>Guarantee</h2>
                    <span>We guarantee that you will never forget anything with us.</span>
                </div>
            </div>
        </div>
    </div>
    
    <section class="footer">
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

    <script src="jsFiles/mainPageAnim.js"></script>
@endsection
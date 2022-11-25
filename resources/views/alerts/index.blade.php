@extends('layout/layout')
@section('head')
<link rel="stylesheet" href="./css/login.css" type="text/css">
<link rel="stylesheet" href="./css/private.css" type="text/css">
<!-- <link rel="stylesheet" href="./css/animate.css" type="text/css"> -->
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
                @if(Auth::user()!=null)
                <li><a href="/login">{{Auth::user()->name}}</a></li>
                @else
                <li><a href="/login">Log in</a></li>
                @endif
            </ul>
        </div>


        <div class="userInfo">
            <h1>Your details</h1>
            <div class="miniblock">
                <div class="mb">
                    <div class="innerminibl">
                        <img id="img1" src="images/manImg.png"><h2>{{Auth::user()->name}}</h2>
                    </div>
                    <div class="innerminibl">
                        <img id="img2" src="images/mailImg.png"><p>{{Auth::user()->email}}</p>
                    </div>      
                </div>
                <div>
                     <a class="btn btn-5" href="{{route('alerts.create')}}">Add new Alert</a>
                    <a class="btn btn-5" href="/logout">logout</a>          
                </div>
            </div>
            
            <div class="tasksBlock">
                <div>
                    <h2>Performed tasks</h2>
                    <div class="tasks ready">
                        <div class="flextask">         
                            <div class="taskDiv">
                                <div onclick="window.location='/alertDetails'" style="background-image: url('{{asset('images/photo1.jpg')}}')" class="task">
                                    <p class="alertInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil neque ipsam fugiat animi unde?</p>
                                </div>
                                <div class="tagdate">
                                    <p class="tag">Tag: qwer</p>
                                    <p class="date">12.10.2021-20.12.2022</p>
                                </div>
                            </div>
                            <div class="checkboxDiv">
                                <div>
                                    <input type="checkbox" id="1" class="_checkbox">
                                    <label class="checked" for="1">
                                        <div id="tick_mark1" class="tick_mark ch"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flextask">
                            <div class="taskDiv">
                                <div style="background-image: url('{{asset('images/photo1.jpg')}}')" class="task">
                                    <p class="alertInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil neque ipsam fugiat animi unde?</p>
                                </div>
                                <div class="tagdate">
                                    <p class="tag">Tag: qwer</p>
                                    <p class="date">12.10.2021-20.12.2022</p>
                                </div>
                            </div>
                            <div class="checkboxDiv">
                                <div>
                                    <input type="checkbox" id="2" class="_checkbox">
                                    <label for="2">
                                        <div id="tick_mark2" class="tick_mark"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2>Active tasks</h2>
                    <div class="tasks">
                    <div class="flextask">
                            <div class="taskDiv">
                                <div style="background-image: url('{{asset('images/photo1.jpg')}}')" class="task">
                                    <p class="alertInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil neque ipsam fugiat animi unde?</p>
                                </div>
                                <div class="tagdate">
                                    <p class="tag">Tag: qwer</p>
                                    <p class="date">12.10.2021-20.12.2022</p>
                                </div>
                            </div>
                            <div class="checkboxDiv">
                                <div>
                                    <input type="checkbox" id="3" class="_checkbox">
                                    <label for="3">
                                        <div id="tick_mark3" class="tick_mark"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script>
    let a = document.querySelectorAll('._checkbox');
    a.forEach(element => {
        element.addEventListener('click', () => {
            if (element.value == "on") {
                element.value = "off";
            } else {
                element.value = "on";
            }
        });
    });

    let b = document.querySelectorAll('.ready ._checkbox');
    b.forEach(element => {
        element.addEventListener('click', () => {
            // element.setAttribute("checked", "");
        });
    });
</script>
@endsection
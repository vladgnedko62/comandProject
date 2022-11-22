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


        <div class="userInfo" style="margin-bottom:700px">
            <h1>Change details</h1>
            <div class="miniblock">
                <!-- <input type="text" require placeholder="Input new name" name="name" value="{{Auth::user()->name}}">
                <input type="email" require placeholder="Input new email" name="name" value="{{Auth::user()->email}}">
                <button class="btn btn-5" type="submit">Submit changes</button> -->
                <a href="/logout">logout</a>
            </div>
            <!-- <a href="/alertCreate">create</a> -->
            <div class="tasksBlock">
                <div>
                    <h2>Performed tasks</h2>
                    <div class="tasks">
                        <div class="flextask">
                            <div style="background-image: url('{{asset('images/photo1.jpg')}}')" class="task">
                                <p class="alertInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil neque ipsam fugiat animi unde?</p>
                                <p class="tag">Tag: qwer</p>
                            </div>
                            <!-- <div class="toggle-pill">
                                <input type="checkbox" id="pill1" name="check">
                                <label for="pill1"></label>                          
                            </div> -->

                            <div class="checkboxDiv">
                                <div>
                                    <input type="checkbox" id="1" class="_checkbox">
                                    <label for="1">
                                    <div id="tick_mark1" class="tick_mark"></div>
                                </div>
                            </div>

                        </div>
                        <div class="flextask">
                            <div style="background-image: url('{{asset('images/photo1.jpg')}}')" class="task">
                                <p class="alertInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil neque ipsam fugiat animi unde?</p>
                                <p class="tag">Tag: qwer</p>
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
                            <div style="background-image: url('{{asset('images/photo1.jpg')}}')" class="task">
                                <p class="alertInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil neque ipsam fugiat animi unde?</p>
                                <p class="tag">Tag: qwer</p>
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
</div>
<script>
    let a = document.querySelectorAll('#_checkbox');
    a.forEach(element => {
        element.addEventListener('click', () => {
            if (element.value == "on") {
                element.value = "off";
            } else {
                element.value = "on";
            }
            console.log(a.value);
        });
    });
</script>
@endsection
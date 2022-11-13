@extends('layout/layout')
@section('head')

<title>Home</title>
@endSection
@section('content')

<div class="banner">
    <div class="navbar animated fadeInLeft">
        <img src="../Logo2White.png" class="logo">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Some text</a></li>
            <li><a href="#">Your cabinet</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Manage your notifications</h1>
        <p>Manage your notifications with our help</p>
        <div>
            <div class="homeButtons">
                <div class="homeButton  animated  rotateInDownLeft">
                    <button type="button"><span></span>HOW DOES IT WORK</button>
                </div>
                <div class="homeButton animated  rotateInDownRight">
                    <button type="button"><span></span>START</button>
                </div>
            </div>



        </div>
    </div>
</div>
<div class="part2"></div>

@endsection
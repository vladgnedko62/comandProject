
@extends('layout/layout')
@section('head')

<title>Home</title>
@endSection
@section('content')

    <div class="banner">
        <div class="navbar animated fadeInDown">
            <img src="../Logo.png" class="logo">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Your cabinet</a></li>
                <li><a href="#">Log in</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Your notifications assistant</h1>
            <p>Manage your notifications.</p>
            <div>
                <button class="animated zoomIn" type="button"><span></span>HOW DOES IT WORK</button>
                <button class="animated zoomIn" type="button"><span></span>START</button>
            </div>
        </div>
    </div>
    <div class="part2">
        <h1>How does it work</h1>
    </div>

@endsection
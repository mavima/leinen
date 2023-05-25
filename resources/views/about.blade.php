@extends('layouts.app')
 
@section('content')
<img class="index-banner" src={{ Storage::url('images/index-banner.png') }}>
<div class="about-container">
    <h2 class="index-title">About Partashare</h2>

    <p class="about-text">Partashare is website for sharing and renting stuff that we sometimes need but wouldn't necessarily like to own. It is only an idea and the items on it exist unfortunately just in my imagination. If someone would like to pursue the project, I would be happy to help of course. I personally would love to borrow a ski box every now and then, and our textile cleaner would definitely deserve to be used more than just a few times a year.</p>

    <p class="about-text">Partashare is a Laravel application I made to make sure I remember how to use the framework. It was pulled together in a few weeks and is by no means a finished product. I chose to create separate controllers following loosely the single responsibility principle. I also created an interface repository file for the item even though in such a small application it would not be necessary. The images are stored in an AWS S3 bucket and the application is hosted in Fly.io using Docker.</p>

    <p class="about-text">Luxembourg, May 2023 | <a href="https://mariam.pro/" target="blank">Maria Manninen <i class="fa-solid fa-circle-info turquoise"></i><a></p>

</div>



 @endsection
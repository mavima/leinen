<a class="navbar-brand navbar-logo" href="{{ url('/') }}">
    <img class="navbar-logo-img" src={{ asset('images/logo.png') }}>
    Partashare
</a>

    <p class="about-text">Partashare is website for sharing and renting stuff that we sometimes need but wouldn't necessarily like to own. It is only an idea and the items on it exist unfortunately just in my imagination. If someone would like to pursue the project, I would be happy to help of course. Next step would be to add a map to see where the items are and a possibility to search items nearby. I personally would love to borrow a rooftop cargo box every now and then, and our textile cleaner would definitely deserve to be used more than just a few times a year.</p>

    <p class="about-text">Partashare is a Laravel application I made to consolidate my skills with the framework. It was thrown together in a few weeks and is by no means a finished product. I chose to create separate controllers following loosely the single responsibility principle. I also created an interface repository file for the item even though in such a small application it would not be necessary. The images are stored in an AWS S3 bucket and the application is hosted in Laravel Vapor, serverless deployment platform powered by AWS Lambda. For styling I used SASS and some Bootstrap. Background images and logo were made with Photoshop.</p>
@extends('layouts.app')
 
@section('content')
<img class="index-banner" src={{ asset('images/index-banner.png') }}>
<div class="about-container">
    <h2 class="index-title">About Partashare</h2>

    <p class="about-text">Partashare is website for sharing and renting stuff that we sometimes need but wouldn't necessarily like to own. It is only an idea and the items on it exist unfortunately just in my imagination. If someone would like to pursue the project, I would be happy to help of course. Next step would be to add a map to see where the items are and a possibility to search items nearby. I personally would love to borrow a rooftop cargo box every now and then, and our textile cleaner would definitely deserve to be used more than just a few times a year.</p>

    <p class="about-text">Partashare is a Laravel application I made to consolidate my skills with the framework. It was built in a few weeks and is by no means a finished product. I chose to create separate controllers following loosely the single responsibility principle. I also created an interface repository file for the item even though in such a small application it would not be necessary. The images are stored in an AWS S3 bucket and the application is hosted in Laravel Vapor, serverless deployment platform powered by AWS Lambda. For styling I used SASS and some Bootstrap. Background images and logo were made with Photoshop.</p>

    <p class="about-text">Luxembourg, June 2023 | <a href="https://mariam.pro/" target="blank">Maria Manninen <i class="fa-solid fa-circle-info turquoise"></i><a></p>

    <p class="about-credits">
        Thanks a lot to the artists who have made the pictures used on the background images:

        <a href="https://pixabay.com/users/clker-free-vector-images-3736/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=25819">Clker-Free-Vector-Images</a>,

        <a href=“https://pixabay.com/users/openclipart-vectors-30363/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=160517">OpenClipart-Vectors</a>,

        <a href="https://pixabay.com/users/ssidde-19562401/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=5928149">SSidde</a>,

        <a href="https://pixabay.com/users/6946758-6946758/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4626525">6946758</a>,

        <a href="https://pixabay.com/users/blue-hat-graphics-24232276/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=7208347">Dimuth Amarasiri</a>,

        <a href="https://pixabay.com/users/msaeedsalem-5655159/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2582491">Mohammed Salem</a>,

        <a href="https://pixabay.com/users/opaye-1806/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=10935">Yao Charlen</a>,

        <a href="https://pixabay.com/users/photomix-company-1546875/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1446093">Photo Mix</a>,

        <a href="https://pixabay.com/users/pix1861-468748/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=673725">Csaba Nagy</a>,

        <a href="https://pixabay.com/users/personbastaab-6350204/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4328114">personbastaab</a>,

        <a href="https://pixabay.com/users/pasja1000-6355831/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=3538245">Julita</a>,

        <a href="https://pixabay.com/users/fabriciomacedophotos-328534/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=3893598">Fabricio Macedo FGMsp</a>,

        <a href="https://pixabay.com/users/stocksnap-894430/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2599070">StockSnap</a> and 

        <a href="https://pixabay.com/users/hans-2/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=59653">Hans</a> from <a href=“https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=59653">Pixabay</a>.

 </p>

</div>



 @endsection
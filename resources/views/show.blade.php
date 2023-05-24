@extends('layouts.app')
@section('content')

<div class="show-container">
    <h2 class="show-title">{{ $item->name }}</h2>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach ($images as $key => $image)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          <img src="{{ Storage::disk('s3')->temporaryUrl($image->filename, '+5 minutes') }}" class="d-block" alt="...">
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon carousel-arrow" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon carousel-arrow" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    

    <p><i class="fa-solid fa-location-dot show-icon"></i>  {{ $item->location }}</p>
    <p><i class="fa-solid fa-euro-sign show-icon"></i> {{$item->price}}€</p>
    <p><i class="fa-regular fa-message show-icon"></i> {{ $item->description }}</p>
    <p><i class="fa-solid fa-tag show-icon"></i></i> {{ $item->category->name }}</p>
    <p><i class="fa-solid fa-user show-icon"></i> {{ $item->owner->name }}</p>

    <div class="show-buttons">
        @if ($currentUser == $item->user_id)
            <a class="l-btn main-btn margin-bottom" href = {{ route('createImage', [$item->id]) }}>Add image</a>
            <a class="l-btn main-btn" href = {{ route('edit', [$item->id]) }}>Edit</a>
        @else
          <a class="l-btn main-btn" href = {{ route('contact', [$item->id]) }}>Contact owner</a>
        @endif
        <a class="l-btn back-btn" href="{{ '/index' }}"><< Back</a>
    </div>
</div>
<script type="module">

      $(document).ready(function() {
        var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 2000,
  wrap: false
})
         
      });
</script>
@endsection
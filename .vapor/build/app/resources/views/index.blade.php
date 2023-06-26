@extends('layouts.app')
 
@section('content')
<img class="index-banner" src={{ asset('images/index-banner.png') }}>
<div class="index-container">
  <h2 class="index-title">Waiting to be shared</h2>
  <form action="{{ route('index') }}" method="GET" enctype="multipart/form-data" class="index-filter-form">
    @csrf
    <select name="category_id" id="category" class="category">
        <option disable selected>--select category--</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name}}</option>
    @endforeach
    </select>
    <button class="l-btn main-btn index-filter-btn">Filter</button>
</form>

    @if (count($items) > 0)
      <div class="index-grid">
        @foreach ($items as $item)
        <div class="card index-card" style="width: 18rem; margin:1rem;">
            <a href = {{ route('show', [$item->slug]) }}>
              @if ($item->images->first() == null)
              <img class="card-img-top" src={{ asset('images/default-card-img.png') }}>
              @else
            <img class="card-img-top" src="{{Storage::disk('s3')->temporaryUrl($item->images->first()->filename, '+5 minutes') }}" alt="{ $item->name }">   
            @endif
            <div class="card-body">       
              <h5 class="card-title">{{$item->name}}</h5>
              <div class="card-body-bottom">
                <p class="card-text">{{$item->location}}</p>
                <p>{{ $item->price }}€/day</p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>

    @else
        <p class="no-matches-text">Sorry, there are no items that match your search. Try again or browse other items.</p>
        <form action="{{ route('index') }}" method="GET" class="no-matches-form">
          <input type="text" name="search" class="home-search" required/>
          <button type="submit" class="l-btn main-btn nomatch-search-btn">Search</button>
        </form>
        <a href = {{ route('index') }}>
          <button class="l-btn main-btn nomatch-btn">Browse</button>
        </a>

      @endif
  </div>
    @endsection
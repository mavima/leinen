@extends('layouts.app')
@section('content')

<div class="show-container">
    <h2>{{ $item->name }}</h2>
    <p>

    </p>

    @foreach($images as $image)
        <img src="{{ Storage::disk('s3')->temporaryUrl($image->filename, '+5 minutes') }}" class="show-image">
    @endforeach

    <p><i class="fa-solid fa-location-dot show-icon"></i>  {{ $item->location }}</p>
    <p><i class="fa-solid fa-euro-sign show-icon"></i> {{$item->price}}€</p>
    <p><i class="fa-regular fa-message show-icon"></i> {{ $item->description }}</p>
    <p><i class="fa-solid fa-tag show-icon"></i></i> {{ $item->category->name }}</p>
    <p><i class="fa-solid fa-user show-icon"></i> {{ $item->owner->name }}</p>

    <div class="show-buttons">
        @if ($currentUser == $item->user_id)
            <a class="l-btn main-btn" href = {{ route('createImage', [$item->id]) }}>Add image</a>
            <a class="l-btn main-btn" href = {{ route('edit', [$item->id]) }}>Edit</a>
        @else
            <button class="main-btn l-btn">Contact owner</button>
        @endif
        <a class="l-btn back-btn" href="{{ '/index' }}"><< Back</a>
    </div>
</div>

@endsection
@extends('layouts.app')
@section('content')

<div class="form-container">
    <h5 class form-subtitle>Add images to your {{ $item->name }}</h5>
    <p>You can add three images in total</p>
    
    <form action="/images/create/{{$item->slug}}" method="POST" enctype="multipart/form-data" class="image-form">
        @csrf
        <input type="file" name="image">
        <button type="submit" class="l-btn main-btn">Add image</button>
    
    </form>

</div>

@endsection
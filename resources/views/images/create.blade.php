@extends('layouts.app')
@section('content')

<div class="form-container">
    <h5 class form-subtitle>Add images to your {{ $item->name }}</h5>
    
    <form action="/images/create/{{$item->id}}" method="POST" enctype="multipart/form-data" class="image-form">
        @csrf
        <input type="file" name="image">
        <button type="submit" class="l-btn main-btn">Add image</button>
    
    </form>

</div>

@endsection
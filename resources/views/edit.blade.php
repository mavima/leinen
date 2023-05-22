@extends('layouts.app')

@section('content')

    <div class="form-container">
        <h2>Edit your item</h2>
        <form action="/edit/{{$item->id}}" method="POST" class="item-form">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" name="name" value={{$item->name}} label="Name">
            <label for="price">Price per day</label>
            <input type="text" name="price" value={{$item->price}}>
            <label for="description">Description</label>
            <textarea name="description">{{$item->description}}</textarea>
            <label for="location">Location</label>
            <input type="text" name="location" value={{$item->location}}>
            <button class="l-btn main-btn form-btn">Save</button>
        </form>
        <h4>Remove images</h4>    
        <div class="edit-image-container">
            @foreach($images as $image)
                <div class="edit-image">
                    <img src="{{ Storage::disk('s3')->temporaryUrl($image->filename, '+5 minutes') }}" width="75px" height="auto">
                    <form action="/images/delete/{{$image->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="l-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

@endsection

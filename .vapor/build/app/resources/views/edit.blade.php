@extends('layouts.app')

@section('content')

    <div class="form-container">
        <h2>Edit the {{$item->name}}</h2>
        <form action="/edit/{{$item->slug}}" method="POST" class="item-form">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <textarea name="name" class="fit-input">{{ $item->name }}</textarea>
            <label for="price">Price per day</label>
            <input type="text" name="price" value={{ $item->price }}>
            <select name="category_id" id="category" class="category" value="Choose">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{($item->category_id === $category->id) ? 'Selected' : ''}}>{{ $category->name}}</option>
                @endforeach
            </select>
            <label for="description">Description</label>
            <textarea name="description">{{ $item->description }}</textarea>
            <label for="location">Location</label>
            <textarea name="location" class="fit-input">{{ $item->location }}</textarea>
            <div class="form-buttons">
                <button class="l-btn main-btn form-btn">Save</button>
            </form>
            <form action="/delete/{{$item->slug}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="l-btn delete-btn form-btn" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
        <br>
    </div>


@endsection

@extends('layouts.app')

@section('content')
    <div class="home-container">
        
        <div class="home-text">
            <h1 class="home-title">Partashare</h1>
            <p>Not everyone needs to own a hammer drill or a snowboard. If yours is collecting dust in the garage, rent or borrow it to someone who needs one. And if you are looking for a ladder or a waffle maker for a day, perhaps you can find it here.</p>
            <p>
                <form action="{{ route('index') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <select name="category_id" id="category" class="home-search">
                        <option disable selected style="color: gray;">--select category--</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                    @endforeach
                    </select>
                    <button class="home-search main-btn l-btn">Choose</button>
                </form>
                <form action="{{ route('index') }}" method="GET">
                    <input type="text" name="search" class="home-search" required/>
                    <button type="submit" class="home-search main-btn l-btn">Search</button>
                </form>
                <br>

            </p>
        </div>
    </div>
@endsection

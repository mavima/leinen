@extends('layouts.app')
@section('content')
 <div class="form-container">
    <h3>Add a new item</h2>
        
    <form action="/create" method="POST" enctype="multipart/form-data" class="item-form">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="price" placeholder="price per day">
        <select name="category_id" id="category" class="category">
            <option disable selected>--select category--</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name}}</option>
        @endforeach
        </select>
        <textarea name="description" placeholder="Description of the item"></textarea>
        <input type="text" name="location" placeholder="location">
        <p class="form-info"><i class="fa-solid fa-circle-info"></i> You can add images after submitting this form.</p>
        <button class="l-btn main-btn form-btn">Save</button>
        <a class="l-btn back-btn form-btn" href="{{ '/index' }}"> Back</a>
    </form>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 </div>

 
@endsection

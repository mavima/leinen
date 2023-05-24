@extends('layouts.app')
@section('content')

<div class="form-container">
    <h3>Contact the owner of {{ $item->name }}</h5>
        <form action="/index" method="GET" enctype="multipart/form-data" class="item-form">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Your name">
            <label for="name">Email</label>
            <input type="text" name="email" placeholder="Your email">
            <label for="name">Phone number</label>
            <input type="text" name="phone" placeholder="Your phone number">
            <label for="name">Message</label>
            <textarea name="description" placeholder="Message to the owner"></textarea>
            <label for="description">Choose a date when you want to borrow the {{ $item->name }}</label>
            <div>
                <select name="month" class="month" value="Choose month">
                    @foreach($months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
                <select name="day" class="day">
                    @foreach (range(1, 30) as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            <p class="form-info"><i class="fa-solid fa-circle-info"></i> This is a dummy form and no message will be sent</p>
            <button class="l-btn main-btn form-btn" onclick="return confirm('Remember that no message is sent, this is just an example.')">Send</button>
            <a class="l-btn back-btn form-btn" href="{{ '/index' }}"> Back</a>
        </form>
</div>

@endsection
@extends('layouts.app')
@section('content')
<div class="index-container">
    <h2 class="index-title">{{$user->name}}'s items</h2>

    <div class="index-grid">
        @foreach($items as $item)
            <div class="card index-card" style="width: 18rem; margin:1rem;">
                <a href = {{ route('show', [$item->id]) }}>
                    @if ($item->images->first() == null)
                        <img class="card-img-top" src={{ Storage::url('images/default-card-img.png') }}>
                    @else
                        <img class="card-img-top" src="{{Storage::disk('s3')->temporaryUrl($item->images->first()->filename, '+5 minutes') }}" alt="{ $item->name }">   
                    @endif
                        <div class="card-body profile-card-body">       
                    <div class="card-body-bottom">
                        <p class="card-text">{{$item->name}}</p>
                        <p>{{ $item->price }}€/day</p>
                    </div>
                    <div class="profile-card-buttons">
                        <a class="l-btn main-btn" href = {{ route('edit', [$item->id]) }}>Edit</a>
                        <form action="/delete/{{$item->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="l-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
    </div>
    <div class="profile-bottom">
        <a class="l-btn main-btn" href = {{ route('new') }}>Add a new item</a>
    </div>
</div>
@endsection
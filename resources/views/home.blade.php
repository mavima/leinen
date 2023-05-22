@extends('layouts.app')

@section('content')
    <div class="home-container">
        <h1 class="home-title">Léinen</h1>
        <div class="home-text">
            <p>Not everyone needs to own a hammer drill or a snowboard. If yours is collecting dust in the garage, rent or borrow it to someone who needs one. And if you are looking for a ladder or a waffle maker for a day, perhaps you can find it here.</p>
            <p>
                <form action="{{ route('index') }}" method="GET">
                    <input type="text" name="search" class="home-search" required/>
                    <button type="submit" class="home-search main-btn l-btn">Search</button>
                </form>
            </p>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
@endsection

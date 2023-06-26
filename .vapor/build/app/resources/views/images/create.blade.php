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

<script type="text/javascript">

    $('.image-form').submit(event => {
        event.preventDefault();

        window.Vapor.store(
            $(.image-form).prop('image').files[0],
            {
                visibility: "public-read"
            }
        ).then(response => {
            axios.post('/item', {
                key: response.key
            })
        }).then(() => window.location.reload());

    });

</script>

@endsection
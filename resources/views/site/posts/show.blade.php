@extends('layouts.site')
@section('content')
<div class="container text-center">
    <div class="jumbotron">
        <h1 class="display-4">{{$post->title}}</h1>
        <img style="width: 500px; height:500px;" src="/storage/featured_images/{{$post->featured_image}}" alt="">
        <p class="lead"> <h1>Post By :{{$post->user->name}}</h1>
        <hr class="my-4">
        <p>{{$post->body}}</p>
        <a class="btn btn-secondary btn-lg" href="{{ route('post.index')}}" role="button">Go Back</a>
    </div>
</div>
@endsection
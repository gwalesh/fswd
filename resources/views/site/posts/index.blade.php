@extends('layouts/site')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="container text-center">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to our Blog</h1>
        <hr class="bg-dark">
        <div class="row p-5">
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route('post.create') }}">Add a New Blog</a>
            </div>
        </div>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col-span-2">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
                <tr>
                  <th scope="row">{{$post->id}}</th>
                  <td><a href="{{ route('post.show', $post->id) }}">{{$post->title}}</td></a>
                  <td><a href="{{ route('post.show', $post->id) }}">{{$post->excerpt}}</td></a>
                  <td><a href="{{ route('post.show', $post->id) }}">{{$post->user->name}}</td></a>
                  <td><a href="{{ route('post.show', $post->id) }}"><img style="width: 250px; height:250px;" src="/storage/featured_images/{{$post->featured_image}}" alt="Featured Image"></td></a>
                  @if(auth()->user()->id == $post->post_by_id)
                    <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
                    <td>
                      <form action="{{ route('post.destroy',[$post->id]) }}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">DELETE</button>
                      </form>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>

    
</div>
@endsection
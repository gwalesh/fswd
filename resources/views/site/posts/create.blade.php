@extends('layouts.site')
@section('content')
<div class="container">
    <div class="jumbotron jumbotron ">
        <div class="row p-5">
            <h2>Add your Blog Post</h2>
            <hr>
            <a href="/" class="btn btn-warning">Go Back</a>
        </div>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="title">Post Title</label>
              <input type="title" name="title" class="form-control" id="title"  placeholder="Enter Post Title">
            </div>
            <div class="form-group">
                <label for="excerpt">Post Excerpt</label>
                <input type="text" name="excerpt" class="form-control" id="excerpt"  placeholder="Enter Excerpt">
              </div>
              <div class="form-group">
                <label for="body">Post Body</label>
                <textarea type="text" name="body" class="form-control" id="body"  placeholder="Enter Body"></textarea>
              </div>
              <div class="form-group">
                <label for="featured_image">Featured image</label>
                <input type="file" name="featured_image" class="form-control-file" id="exampleFormControlFile1">
              </div>
              <div class="form-group">
                <input type="text" name="post_by_id" class="form-control" value="{{ Auth::user()->id }}" id="post_by">
              </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
    </div>
  </div>
        
@endsection
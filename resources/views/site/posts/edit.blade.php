@extends('layouts.site')
@section('content')
<div class="container">
    <div class="jumbotron jumbotron ">
        <div class="row p-5">
            <h2>Add your Blog Post</h2>
            <hr>
            <a href="/" class="btn btn-warning">Go Back</a>
        </div>
        <form action="{{ route('post.update', [$post->id]) }}}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="form-group">
              <label for="title">Post Title</label>
              <input type="title" name="title" class="form-control" id="title" value="{{$post->title}}" placeholder="Enter Post Title">
            </div>
            <div class="form-group">
                <label for="excerpt">Post Excerpt</label>
                <input type="text" name="excerpt" class="form-control" id="excerpt" value="{{$post->excerpt}}" placeholder="Enter Excerpt">
              </div>
              <div class="form-group">
                <label for="body">Post Body</label>
                <textarea type="text" name="body" class="form-control" id="body" value="{{ $post->body }}" placeholder="Enter Body"></textarea>
              </div>
              <div class="form-group">
                <label for="featured_image">Featured image</label>
                <input type="file" name="featured_image" class="form-control-file"  id="exampleFormControlFile1">
              </div>
              <div class="form-group">
                <input type="text" name="post_by_id" class="form-control" value="{{ Auth::user()->id }}" id="post_by">
              </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
    </div>
  </div>

  {{-- <script>
    Dropzone.options.blogImageDropzone = {
    url: '{{ route('post.update') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="blog_image"]').remove()
      $('form').append('<input type="hidden" name="blog_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="blog_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($blog) && $blog->blog_image)
      var file = {!! json_encode($blog->blog_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="blog_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script> --}}
        
@endsection
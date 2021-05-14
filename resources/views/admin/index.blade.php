@extends('layouts.site')
@section('content')

@if(session()->has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <div class="container text-center">

        <div class="jumbotron">
            <h1>Welcome you are a Super user! </h1>
        </div>
    </div>
@endsection
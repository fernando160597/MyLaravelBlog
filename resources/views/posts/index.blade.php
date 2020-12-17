@extends('layouts.posts')
@section('body')
<br>
<div class="container">
  <div class="row justify-content-md-center">
    @foreach($posts as $post)
    <div class="col">
      <div class="card text-white bg-dark">
        <div class="card-body">
          <h5 class="card-title text-center">{{$post->title}}</h5>
          <p id = "content" class="card-text">{{$post->content}}</p>
          {{$posts->links('vendor.pagination.simple-bootstrap-4')}}
        </div>
    @endforeach
  </div>
</div>


  @endsection

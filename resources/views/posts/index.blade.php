@extends('layouts.posts')
@section('body')
<br>
<div class="container">
  <div class="row">
    @foreach($posts as $post)
    <div class="col">
      <div class="card text-white bg-dark mb-3" style="width: 300px;">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->content}}</p>
          <a href="#" class="btn btn-secondary">Go somewhere</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

  @endsection

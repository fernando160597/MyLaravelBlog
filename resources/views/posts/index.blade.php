@extends('layouts.posts')
@section('body')
<br>
<div class="container">
  <div class="row">
    @foreach($posts as $post)
    <div class="col">
      <div class="card text-white bg-dark">
        <div class="card-body">
          <h5 class="card-title text-center">{{$post->title}}</h5>
          <p class="card-text text-center">{{$post->content}}</p>
          {{$posts->links('vendor.pagination.simple-bootstrap-4')}}
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


  @endsection

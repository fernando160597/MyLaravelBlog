@extends('layouts.posts')
@section('body')
<br>
@if(count($posts) == 0)
<div class="alert alert-danger" role="alert">
  There is no Posts 
</div>
<div class="container">
  <div class="row justify-content-md-center">
      <div class="col col-lg-1">
          <a href="/home" class="btn btn-primary">Refresh</a>
      </div>
      <div class="col col-lg-2">
          <a href="/create" class="btn btn-success">Create</a>
      </div>
  </div>
@endif
<div class="container">
  <div class="row justify-content-md-center">
    @foreach($posts as $post)
    <div class="col">
      <div class="card text-white bg-dark">
        <div class="card-header">
          @if(Auth::user()->id == $post->creator_id || Auth::user()->is_admin)
          <form method="post" action="/posts/delete/{{ $post->id}}" 
            onsubmit="return confirm('Do you want to remove the post :  {{ addslashes( $post->title )}}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger animate__bounceOut animate_animated" id="left-icon"><i class="fa fa-trash"></i></button>      
        </form>
        <form method="post" action="/posts/edit/{{ $post->id}}">
          @csrf
          <button class="btn btn-warning  animate__bounceOut animate_animated" id="right-icon"><i class="fa fa-edit"></i></button>
        </form>
        @endif
        
          <h5 class="card-title text-center animate__animated animate__bounceInDown">{{$post->title}}</h5>
        </div>
        <div class="card-body">
          <p id = "content" class="card-text animate__animated animate__bounceInLeft ">{{$post->content}}</p>         
        </div>
        <div class="card-footer">
          {{$posts->links('vendor.pagination.simple-bootstrap-4')}}
        </div>
    @endforeach
  </div>
</div>


  @endsection

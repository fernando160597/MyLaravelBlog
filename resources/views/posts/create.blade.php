@extends('layouts.posts')
@section('body')
<br>
<div class="jumbotron">
  <div class="container">
    <div class="form-floating">
      <form action="/create" method="post">
        @csrf
      <input type="text" class="form-control" id="floatingPassword" placeholder="Title" name="title">
      <br>
    </div>
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here"
      id="floatingTextarea2" style="height: 300px" name="content"></textarea>
      <label for="floatingPassword">Content</label>
    </div>
    <button type="submit" class="btn btn-success" name="button">Save</button>
    </form>
  </div>
</div>
@endsection

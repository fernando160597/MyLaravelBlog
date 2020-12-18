@extends('layouts.posts')
@section('body')
<br>
<div class="jumbotron">
  <div class="container">
    <div class="form-floating">
      <form action="/create" method="post">
        @csrf
      <input type="text" class="form-control" id="floatingPassword" placeholder="Title" name="title" required>
      <br>
    </div>
    <div class="form-floating">
      <textarea class="form-control" required
      id="floatingTextarea2" style="height: 300px" name="content"></textarea>
      <label for="floatingPassword">Content</label>
  
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-5">
     
    </div>
    <div class="col-sm">
      <br>
      <button type="submit" class="btn btn-success btn-lg btn-block">Save Post</button>
    </div>
    <div class="col-sm">
     
    </div>
  </div>
</div>
</form>
</div>
@endsection

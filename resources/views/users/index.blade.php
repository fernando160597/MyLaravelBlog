@extends('layouts.posts')
@section('body')
<br>
<div class="table-responsive-sm">
<table class="table table-dark table-hover table-responsive">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">#</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            @if(Auth::user()->is_admin)
            <td>{{$user->id}}</td>
            @else
            <td></td>
            @endif
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @if (Auth::user()->is_admin && $user->email !== Auth::user()->email )
            <td>
            <form method="post" action="/users/delete/{{ $user->id}}" 
                onsubmit="return confirm('Do you wanna remove the user :  {{ addslashes( $user->name )}}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
            @else 
            <td></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
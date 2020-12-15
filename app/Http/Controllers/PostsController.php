<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

  public function index(Request $request) {

    //Página postagens, com paginação 1 e a busca não sensitiva, maisuculo ou minusculo

    $lowerSearch = strtolower($request->search);

    $posts = Post::orderBy('id')
    ->where('title','LIKE','%'.$request->search.'%')
    ->orWhere('content','LIKE','%'.$request->search.'%')
    ->orWhere('content','LIKE','%'.$lowerSearch.'%')
    ->orWhere('title','LIKE','%'.$lowerSearch.'%')
    ->simplePaginate(2);

    return view('posts.index', ['posts' => $posts,
    'search' =>$request->search ]);

  }

  public function create(){

    return view ('posts.create');
  }

  //Save the new post in the database
  public function store(Request $request){

    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->creator_id =Auth::user()->id;
    $post->save();
    return redirect('/home');
  }

  // $users = DB::table('posts')
  //    ->leftJoin('users', 'users.id', '=', 'posts.creator_id')
  //    ->get();
  //
  //    foreach ($users as $key) {
  //
  //      echo $key->name;
  //      // code...
  //    }
  //


}

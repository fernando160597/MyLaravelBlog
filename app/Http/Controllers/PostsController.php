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
    ->simplePaginate(1);

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

  public function destroy (Request $request){
        
       
    Post::destroy($request->id);
    return redirect('/home');
}

//Procura o post pelo id no banco e redireciona para a tela de edição
public function change (Request $request){

  $post =  Post::orderBy('id')
  ->where('id','=',$request->id)
  ->get();

  return view('posts.edit', ['post' => $post]);
}

// //Faz um update usando as informações colocadas na tela de editar
// public function update (Request $request){

// Postagem::where('id',$request->id)
// ->update(['titulo'=>$request->titulo,'conteudo'=>$request->conteudo]);

// return redirect('/postagens');
// }

}

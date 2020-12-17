<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    //

    public function index(Request $request) {

        //Página postagens, com paginação 1 e a busca não sensitiva, maisuculo ou minusculo
    
        $users = DB::table('users')->get();
        

        return view('users.index', ['users' => $users]);
    
      }

      public function destroy (Request $request){
        
       
        User::destroy($request->id);
        return redirect('/home');
    }
}

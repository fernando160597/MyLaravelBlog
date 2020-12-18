<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', 'App\Http\Controllers\PostsController@index')->name('home');

Route::get('/create', 'App\Http\Controllers\PostsController@create')
->name('create')
->middleware('auth');

Route::post('/create', 'App\Http\Controllers\PostsController@store')
->name('create')
->middleware('auth');

Route::get('/users','App\Http\Controllers\UsersController@index')->name('users');

Route::delete('/users/delete/{id}', 'App\Http\Controllers\UsersController@destroy');

Route::delete('/posts/delete/{id}', 'App\Http\Controllers\PostsController@destroy');

Route::get('/posts/edit/{id}','App\Http\Controllers\PostsController@change');


Route::get('/logout', function () {

    Auth::logout();
    return redirect('/login');
});

Route::get('/dashboard', function () {
  return redirect()->route('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

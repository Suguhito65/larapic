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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@index');
Route::resource('posts', 'PostController', ['only' => ['show', 'create', 'store']]);
Route::get('posts/edit/{id}', 'PostController@edit');
Route::post('posts/edit', 'PostController@update');
Route::post('posts/delete/{id}', 'PostController@destroy');
Route::get('posts/like/{id}', 'PostController@like')->name('post.like');
Route::get('posts/unlike/{id}', 'PostController@unlike')->name('post.unlike');

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

Auth::routes();

// ユーザー
Route::resource('users', 'UserController', ['only' => 'show']);

Route::get('/', 'PostController@index');
// 検索(Routeの位置が投稿の下にあると404になるので注意)
Route::get('posts/search', 'PostController@search')->name('posts.search');
// 投稿
Route::resource('posts', 'PostController', ['only' => ['show', 'create', 'store']]);
Route::prefix('posts')->name('posts.')->group(function () {
  Route::get('edit/{id}', 'PostController@edit')->name('edit');
  Route::post('edit', 'PostController@update')->name('update');
  Route::post('delete/{id}', 'PostController@destroy')->name('destroy');
  // いいね
  Route::get('like/{id}', 'PostController@like')->name('like');
  Route::get('unlike/{id}', 'PostController@unlike')->name('unlike');
});
// コメント
Route::resource('comments', 'CommentController', ['only' => ['create', 'store']])->middleware('auth');

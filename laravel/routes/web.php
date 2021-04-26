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
// 投稿
Route::get('/', 'PostController@index');
Route::resource('posts', 'PostController', ['only' => ['show', 'create', 'store']]);
Route::prefix('posts')->name('posts.')->group(function () {
  Route::get('edit/{id}', 'PostController@edit')->name('edit');
  Route::post('edit', 'PostController@update')->name('update');
  Route::post('delete/{id}', 'PostController@destroy')->name('destroy');
  // いいね
  Route::get('like/{id}', 'PostController@like')->name('like');
  Route::get('unlike/{id}', 'PostController@unlike')->name('unlike');
  // 検索
  Route::post('search', 'PostController@search')->name('search');
});
// コメント
Route::resource('comments', 'CommentController')->middleware('auth');

<?php

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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
//ログイン中ページ、auth認証ずみ
Route::group(['middleware' => 'auth'], function () {  //ログイン認証しているページをくくる
  Route::get('/top', 'PostsController@index');  //トップページ
  Route::post('/post/create', 'PostsController@create'); //投稿用ルーティング
  Route::get('/post/{id}/updateForm', 'PostsController@updateForm'); //投稿の編集ページへ
  Route::post('/post/update', 'PostsController@update'); //投稿の編集完了→トップへ反映
  Route::get('/post/{id}/delete', 'PostsController@delete'); //投稿の削除

  Route::get('/profile', 'UsersController@profile');  //プロフィールページ
  Route::get('/search', 'UsersController@search');  //検索ページ
  Route::get('/follow-list', 'FollowsController@followList');  //フォローリスト
  Route::get('/follower-list', 'FollowsController@followerList');  //フォロワーページ
});

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');  //ログイン前ページ
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');  //新規登録ページ
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');  //新規登録成功ページ
Route::post('/added', 'Auth\RegisterController@added');


//ログアウト機能
Route::get('/logout', 'Auth\LoginController@logout');  //ログアウト

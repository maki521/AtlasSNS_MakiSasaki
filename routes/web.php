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

//Route::get('/', function () {
//  return view('welcome');
//});
//Route::get('/home', 'HomeController@index')->name('home');

// 認証ルートの設定
//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::middleware(['auth'])->group(function () {
  Route::get('/top','PostsController@index')->name('top');
  Route::post('/top','PostsController@index');

  Route::get('/profile','UsersController@profile')->name('profile');

  Route::get('/search','UsersController@index')->name('search');

  Route::get('/follow-list','PostsController@index')->name('follow-list');
  Route::get('/follower-list','PostsController@index')->name('follower-list');
  //アコーディオンメニュー
  Route::get('/menu', function () {
    return view('menu');
});


//ログアウト機能
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

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

Route::get('/', function () {
    return view('welcome');
}); //ログインしないとログイン画面にリダイレクトされる仕様になる
Route::group(['prefix' => 'admin','admin', 'middleware' => 'auth'],function() {
  Route::get('news/create','Admin\NewsController@add');
  Route::get('news/edit', 'Admin\NewsController@edit');
  Route::post('news/create', 'Admin\NewsController@create');
  Route::post('news/edit', 'Admin\NewsController@edit');
  Route::post('news/edit', 'Admin\NewsController@update');
  Route::get('news', 'Admin\NewsController@index');
  Route::post('news/delete', 'Admin\NewsController@delete');
  
  Route::get('profile/create', 'Admin\ProfileController@add');
  Route::get('profile/edit', 'Admin\ProfileController@edit');
  Route::post('profile/create', 'Admin\ProfileController@create');
  Route::post('profile/edit', 'Admin\ProfileController@update');
  Route::get('profile', 'Admin\ProfileController@index');
  Route::post('profile/delete', 'Admin\ProfileController@delete'); 
  

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


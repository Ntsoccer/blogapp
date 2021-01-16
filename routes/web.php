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
});

Route::group(['prefix'=>'blog','middleware'=>'auth'],function(){
  Route::get('index','PostController@index')->name('blog.index');
  Route::get('create','PostController@create')->name('blog.create');
  Route::post('store','PostController@store')->name('blog.store');
  Route::get('edit/{id}','PostController@edit')->name('blog.edit');
  Route::put('update/{id}','PostController@update')->name('blog.update');
  Route::delete('destroy/{id}','PostController@destroy')->name('blog.destroy');
  Route::post('favorite/{id}','FavoriteController@store')->name('favorites');
  Route::delete('unfavorite/{id}','FavoriteController@destroy')->name('unfavorites');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
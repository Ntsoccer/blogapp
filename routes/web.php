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
  Route::post('update/{id}','PostController@update')->name('blog.update');
  Route::post('destroy/{id}','PostController@destroy')->name('blog.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
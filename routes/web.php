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
Route::get('/', 'GuestController@index');
Route::get('/search', 'GuestController@index');
Route::post('/search', 'GuestController@search');
Auth::routes();
Route::group(['middleware' => 'auth'], function(){
  Route::get('/home', 'AdminController@index')->name('home');
  Route::get('/token', 'AdminController@token')->name('token');
  Route::post('/generate', 'AdminController@generate')->name('generate');
  Route::resource('/colis', 'ColisController')->except(['edit']);
  Route::resource('/posts', 'PostsController')->except(['edit']);
});

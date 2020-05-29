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

Route::get('/','UIController@index')->name('root');
Route::get('/home','UIController@index')->name('home');
Route::get('p/{post}/{title?}','UIController@post')->name('post');


Auth::routes();


Route::group(['prefix'=> 'admin' ,'middleware' => ['auth', 'SuperAdminOnly']], function () {
  Route::get('/','AdminController@home')->name('adminHome');
  Route::get('/home','AdminController@home')->name('admin');

  Route::resource('posts','PostController');
  Route::get('profile',function () {
    // code...
  })->name('profile');


});

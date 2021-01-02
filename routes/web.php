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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/news', 'newsController@news');
Route::get('/post', 'myCollectionController@create')->name('post.create');
Route::post('/store', 'myCollectionController@store')->name('post.store');
Route::get('/showd', 'myCollectionController@show')->name('post.show');
Route::get('/search', 'myCollectionController@search')->name('post.search');


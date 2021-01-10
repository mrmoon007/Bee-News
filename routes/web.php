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

Route::get('/home', 'myCollectionController@show')->name('home');
Route::get('/news', 'newsController@news');
Route::get('/post', 'myCollectionController@create')->name('post.create');
Route::post('/store', 'myCollectionController@store')->name('post.store');
Route::get('/delete/{$id}', 'myCollectionController@show')->name('post.delete');
Route::get('/search', 'myCollectionController@search')->name('post.search');
Route::get('/password', 'myCollectionController@password')->name('change.password');
Route::post('/update/password', 'myCollectionController@passwordUpdate')->name('update.password');

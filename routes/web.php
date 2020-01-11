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

Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('news/create','Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create'); // 追記
    Route::get('news', 'Admin\NewsController@index'); // 追記
    Route::get('profile', 'Admin\ProfileController@index'); 
    Route::get('news/edit', 'Admin\NewsController@edit'); // 追記（PHP/Laravel 16）
    Route::post('news/edit', 'Admin\NewsController@update'); // 追記（PHP/Laravel 16）
    Route::get('news/delete', 'Admin\NewsController@delete');
    Route::get('profile/delete', 'Admin\ProfileController@delete');
    
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create'); // PHP/Laravel 13 応用3
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update'); // PHP/Laravel 13 応用6
    
    
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//一般ユーザーNews表示用index
Route::get('/', 'NewsController@index');

//一般ユーザーProfile表示用index
Route::get('profile', 'ProfileController@index');



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
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pages', 'HomeController@index');
//Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
//Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
//
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/logout', 'AuthController@logout');
//    Route::get('profile', 'ProfileController@index');
//    Route::post('profile', 'ProfileController@store');
//    Route::post('/comment', 'CommentsController@store');
//    Route::resource('/tags', 'TagsController');
//});
//
//Route::group(['middleware' => 'guest'], function () {
//    Route::get('/register', 'AuthController@registerForm');
//    Route::post('/register', 'AuthController@register');
//    Route::get('/login', 'AuthController@loginForm');
//    Route::post('/login', 'AuthController@login');
//});

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => '', 'namespace' => 'Admin', 'as' => 'api.'], function () {

    //Route::resource('/users', 'UsersController')->except(['show', 'update', 'index']);
    Route::get('/users', 'UsersController@fetchUsers');
    Route::post('/users', 'UsersController@store');
    Route::post('/users/{user}', 'UsersController@update');
    Route::delete('/users/{user}', 'UsersController@destroy');

    Route::get('/posts', 'PostsController@fetchPosts');
    Route::post('/posts', 'PostsController@store');
    Route::post('/posts/{post}', 'PostsController@update');
    Route::delete('/posts/{post}', 'PostsController@destroy');

    Route::get('/tags', 'TagsController@fetchTags');
});


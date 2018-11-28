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

    Route::resource('/users', 'UsersController')->except(['show', 'index']);
    Route::get('/users', 'UsersController@fetchUsers');
    Route::post('users/uploads', 'UsersController@uploadAvatar')->name('users.upload');
    Route::post('/api/users', 'UsersController@store');
});


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
    return view('layout');
});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/service', 'HomeController@service');
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about');
Route::get('/coming-soon', 'HomeController@comingSoon');
Route::get('/404', 'HomeController@notfound');
Route::get('/portfolio', 'HomeController@portfolio');
Route::get('/portfolio-single', 'HomeController@portfolioSingle');
Route::get('/blog-grid', 'HomeController@blogGrid');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::post('/comment', 'CommentController@store');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/tags', 'TagsController');
    //Route::resource('/users', 'UsersController');
    Route::get('/users','UsersController@index')->name('users.index');
    Route::resource('/posts', 'PostsController');
    Route::resource('/comments', 'CommentsController');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
});

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


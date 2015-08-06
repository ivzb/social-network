<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

// Profile routes
Route::get('/profile/edit', 'ProfileController@edit');
Route::post('/profile/update', 'ProfileController@update');
Route::get('/profile/{username}', 'ProfileController@show');
Route::get('/profile/', 'ProfileController@index');

// Home routes
Route::get('/home', 'HomeController@index');
Route::get('/', 'GuestController@index');

// Post routes
Route::post('/post/store', 'PostController@store');
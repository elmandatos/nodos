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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::resource("users", "UsersController");
Route::resource("hours", "HoursController");



    // Route::get('/usuarios', ['as' => 'users', 'uses' => 'PagesController@usuarios']);
    // Route::post('/new', ['as' => 'new', 'uses' => 'PagesController@formulario']);
    // Route::get('/registro', ['as' => 'registro', 'uses' => 'PagesController@registro']);

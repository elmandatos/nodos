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
Route::post('/user/{id}/get_in', ['as' => 'get_in', 'uses' => 'HoursController@get_in']);
Route::post('/user/{id}/get_out', ['as' => 'get_out', 'uses' => 'HoursController@get_out']);

Route::get('sendAllEmails', ['as' => 'sendEmails', 'uses' => 'EmailsController@sendAllEmails']);

//Users Routes
Route::get('users/{id}/qr', "UsersController@generateQr")->name('users.generateQr');
Route::resource("users", "UsersController");

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

?>

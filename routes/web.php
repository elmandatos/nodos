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

// Route::get("test", function(){
//     $user = new App\User;
//     $user->nombres = "Daniel";
//     $user->apellidos = "Jimenez";
//     $user->telefono = "9341127035";
//     $user->correo = "mandatos@gmail.com";
//     $user->carrera = "carrera";
//     $user->rol = "Servicio";
//     $user->tipo_de_usuario= "admin";
//     $user->password = bcrypt("mandatos");
//     $user->save();
//     return $user;
//
// });

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
//Users Routes
Route::resource("users", "UsersController");
// Route::resource("hours", "HoursController");

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');



    // Route::get('/usuarios', ['as' => 'users', 'uses' => 'PagesController@usuarios']);
    // Route::post('/new', ['as' => 'new', 'uses' => 'PagesController@formulario']);
    // Route::get('/registro', ['as' => 'registro', 'uses' => 'PagesController@registro']);

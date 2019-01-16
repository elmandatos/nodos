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
Route::get('/user/{id}/get_in', ['as' => 'get_in', 'uses' => 'HoursController@get_in']);
Route::get('/user/{id}/get_out', ['as' => 'get_out', 'uses' => 'HoursController@get_out']);

Route::get('users/sendAllEmails', ['as' => 'sendEmails', 'uses' => 'EmailsController@sendAllEmails']);
Route::get('/{id}/sendUserEmail', ['as' => 'sendEmail', 'uses' => 'EmailsController@sendUserEmail']);

//Users Routes
Route::get('users/{id}/qr', "UsersController@generateQr")->name('users.generateQr');
Route::get('users/search', "UsersController@search")->name('users.search');
Route::resource("users", "UsersController",['parameters' => [
   'users' => 'id'
]]);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset/', 'Auth\ResetPasswordController@showResetForm')->name('showResetForm');
Route::post('password/reset/', 'Auth\ResetPasswordController@resetPassword')->name('resetPassword');

//Rutas import excel
Route::get('/import', 'UserData@index')->name("usersData.index");
Route::post('/import', 'UserData@importUsers')->name("usersData.import");

Route::get('/import/hours', 'UserData@indexHours')->name("usersData.usersDataHours");
Route::post('/import/hours', 'UserData@importUserHours')->name("usersData.importHours");
Route::get('/export', 'UserData@exportUsersHours')->name("usersData.export");
Route::get('/exportUsersCeluas', 'UserData@exportUsersCelulasHours')->name("usersCelulasData.export");

//inventario
// Route::get('/inventario/{nombre?}',['as'=> 'almacen', 'uses'=> 'InventoryController@nombre']);
//Route::get('/almacen',['as'=> 'almacen', 'uses'=> 'InventoryController@nombre']);
//Route::post('almacenado', 'InventoryController@validacion');
Route::get('almacen',['as' => 'almacen.index', 'uses'=> 'RestInventario@index']);
Route::post('almacen/buscar',['as' => 'almacen.buscar', 'uses'=> 'RestInventario@buscar']);
Route::get('almacen/crear', ['as' =>'almacen.create', 'uses'=> 'RestInventario@create']);
Route::post('almacen', ['as' =>'almacen.store', 'uses'=> 'RestInventario@store']);
Route::get('almacen/{id}',['as' => 'almacen.show', 'uses'=> 'RestInventario@show']);
Route::get('almacen/search',['as' => 'almacen.search', 'uses' => 'RestInventario@search']);	
Route::get('almacen/{id}/edit',['as' => 'almacen.edit', 'uses'=> 'RestInventario@edit']);
Route::put('almacen/{id}',['as' => 'almacen.update', 'uses'=> 'RestInventario@update']);
Route::delete('almacen/{id}',['as' => 'almacen.destroy', 'uses'=> 'RestInventario@destroy']);
//Prestamos
Route::get('prestamos',['as' => 'prestamos.index', 'uses'=> 'PrestamosController@index']);
Route::post('prestamos/buscar',['as' => 'prestamos.buscar', 'uses'=> 'PrestamosController@buscar']);
Route::get('prestamos/search',['as' => 'prestamos.search', 'uses' => 'PrestamosController@search']);

Route::post('prestamos/buscarPieza',['as' => 'prestamos.buscarPieza', 'uses'=> 'PrestamosController@buscarPieza']);
Route::get('prestamos/searchPieza',['as' => 'prestamos.searchPieza', 'uses' => 'PrestamosController@searchPieza']);
Route::post('prestamos', ['as' =>'prestamos.store', 'uses'=> 'PrestamosController@store']);	

Route::delete('prestamos/{id}',['as' => 'prestamos.destroy', 'uses'=> 'PrestamosController@destroy']);


?>


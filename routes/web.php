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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout');


// ROTAS DO USUARIO
Route::get('/usuario', 'usuarioController@index');
Route::get('/usuario/adicionar', 'usuarioController@adicionar');
Route::get('/usuario/editar/{id}', 'usuarioController@editar');
Route::post('/usuario/add', 'usuarioController@add');
Route::post('/usuario/edit', 'usuarioController@edit');
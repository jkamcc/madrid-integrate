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

Route::get('/', 'HomeController@index');

Route::get('/estudiantes', 'StudentsController@index');

Route::get('/estudiantes/crear', 'StudentsController@create');

Route::get('/estudiantes/{id}', 'StudentsController@show');

Route::post('/estudiantes', 'StudentsController@store');

Route::get('/estudiantes/{id}/editar', 'StudentsController@edit');

Route::put('/estudiantes/{id}', 'StudentsController@update');

//Auth::routes();
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
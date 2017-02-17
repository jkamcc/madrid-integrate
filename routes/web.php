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

use App\Student;

Route::get('/', function () {
    return view('index');
});

// Route::get('/estudiantes', function () {
//     return view('students.index');
// });

Route::get('/estudiantes', 'StudentsController@index');

Route::get('/estudiantes/nuevo', 'StudentsController@create');

Route::get('/estudiantes/{id}', 'StudentsController@show');

Route::post('/estudiantes', 'StudentsController@store');
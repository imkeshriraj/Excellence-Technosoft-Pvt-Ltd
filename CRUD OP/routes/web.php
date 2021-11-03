<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','student_controller@index');
// Route::get('/','student_controller@index')->middleware('checkUser');

Route::get('/getData','student_controller@getData');

Route::post('/studentadd','student_controller@store');

Route::post('/studentUpdate','student_controller@update');

Route::delete('/studentdelete/{id}','student_controller@destroy');

Route::get('/import-form','student_controller@importForm');

Route::post('/import','student_controller@import')->name(('import'));

Route::get('getState/{country}','student_controller@getState');

Route::get('getcity/{state}','student_controller@getCity');
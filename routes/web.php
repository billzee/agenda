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

Route::resource('appointment', 'AppointmentController');
Route::resource('people', 'PeopleController');
Route::resource('places', 'PlacesController');
Route::resource('goals', 'GoalsController');
Route::get('/', 'AppointmentController@index');

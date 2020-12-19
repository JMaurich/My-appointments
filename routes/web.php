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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Specialty
Route::get('/specialties', 'SpecialtyController@index')->name('specialties.index');
Route::get('/specialties/create', 'SpecialtyController@create')->name('specialties.create');
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit')->name('specialties.edit');
Route::post('/specialties', 'SpecialtyController@store')->name('specialties.store');
Route::put('/specialties/{specialty}', 'SpecialtyController@update')->name('specialties.update');
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy')->name('specialties.destroy');

//Doctor

Route::resource('doctors', 'DoctorController');

//Patient


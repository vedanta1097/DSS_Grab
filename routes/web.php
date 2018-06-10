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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

//alternatif
Route::get('/alternatif', 'AlternativeController@index');
Route::post('/alternatif', 'AlternativeController@store');
Route::get('/alternatif/create', 'AlternativeController@create');
Route::get('/alternatif/{alternative}', 'AlternativeController@edit');
Route::patch('/alternatif/{alternative}', 'AlternativeController@update');
Route::delete('/alternatif/{alternative}', 'AlternativeController@destroy');
Route::post('/alternatif/reset', 'AlternativeController@reset');

//kriteria
Route::get('/kriteria', 'CriteriaController@index');
Route::post('/kriteria', 'CriteriaController@store');
Route::get('/kriteria/{criteria}', 'CriteriaController@edit');
Route::patch('/kriteria/{criteria}', 'CriteriaController@update');
Route::delete('/kriteria/{criteria}', 'CriteriaController@destroy');

//crips
Route::get('/crips', 'CripsController@index');
Route::post('/crips', 'CripsController@store');
Route::get('/crips/{criteria}', 'CripsController@show');
Route::get('/crips/edit/{crips}', 'CripsController@edit');
Route::patch('/crips/{crips}', 'CripsController@update');
Route::delete('/crips/{crips}', 'CripsController@destroy');

//perhitungan
Route::get('/perhitungan', 'PerhitunganController@index');
Route::get('/perhitungan/data', 'PerhitunganController@index');
Route::get('/perhitungan/normalisasi', 'PerhitunganController@normalisasi');
Route::get('/perhitungan/perankingan', 'PerhitunganController@perankingan');

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
    return view('home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    Route::resource('specialities', 'SpecialitiesController');
    Route::resource('students', 'StudentsController');
});

Route::resource('supervisors', 'SupervisorsController');
Route::resource('theses', 'ThesesController');

Route::post('search_thesis', 'SearchController@search_thesis');
Route::post('search', 'HomeController@search');
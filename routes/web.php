<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
	Route::resource('crud', 'StudentController');
	Route::get('crud/activate/{id}', 'StudentController@activate');
    Route::get('crud/deactivate/{id}', 'StudentController@deactivate');
});

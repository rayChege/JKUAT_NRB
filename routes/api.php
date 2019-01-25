<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('events', 'EventController@index');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('events', 'EventController@index');
    Route::get('events/{event}', 'EventController@show');
    Route::post('events', 'EventController@store');
    Route::put('events/{event}', 'EventController@update');
    Route::delete('events/{event}', 'EventController@destroy');
    Route::resource('years', 'YearController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('timetables', 'TimetableController');

});

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
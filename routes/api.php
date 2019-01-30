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
Route::group(['prefix' => 'user-management', 'middleware' => ['auth', 'permission:admin']], function() {

    Route::get('/users', function(){
       return "sds";
    });

 });
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('events', 'EventController@index');
    Route::get('events/{event}', 'EventController@show');
    Route::post('events', 'EventController@store');
    Route::put('events/{event}', 'EventController@update');
    Route::delete('events/{event}', 'EventController@destroy');
    Route::resource('departments', 'DepartmentController');
    Route::resource('timetables', 'TimetableController');
    //Route::resource('years', 'YearController');
    Route::post('years/{id}', 'YearController@update');
    Route::get('years',[
        'as' => 'years.index',
        'uses' => 'YearController@index'
    ] );
    Route::delete('years/{id}', 'YearController@destroy');

});


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

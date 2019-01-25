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
Route::get('events/all', [
'as'=> 'events.list',
'uses' => 'EventController@index'
]);

Route::get('events/add', [
'as' => 'events.add',
'uses' => 'EventController@addEvents'
]);

Route::post('events/insert', [
'as' => 'events.store',
'uses' => 'EventController@store'
]);

Route::get('events/{id}', [
'as' => 'events.edit',
'uses' => 'EventController@edit'
]);

Route::put('/events/{event}/update',[
'as' => 'events.update',
'uses' => 'EventController@updated'
]);

Route::delete('events/{event}', [
'as' => 'events.destroy',
'uses' => 'EventController@destroy']);

Route::resource('departments', 'DepartmentController');
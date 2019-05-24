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

Route::get('/clients', 'ClientsController@index');
Route::get('/services', 'ServicesController@index');
Route::get('/requests', 'RequestsController@index');

Route::post('/clients', 'ClientsController@create');
Route::post('/services', 'ServicesController@create');
Route::post('/requests', 'RequestsController@create');

Route::put('/clients/{id}', 'ClientsController@update');
Route::put('/services/{id}', 'ServicesController@update');
Route::put('/requests/{id}', 'RequestsController@update');

Route::delete('/clients/{id}', 'ClientsController@delete');
Route::delete('/services/{id}', 'ServicesController@delete');
Route::delete('/requests/{id}', 'RequestsController@delete');




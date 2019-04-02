<?php

Route::get('/clients', 'ClientController@Get');
Route::get('/services', 'ServiceController@Get');
Route::get('/orders', 'OrderController@Get');

Route::post('/clients', 'ClientController@Create');
Route::post('/services', 'ServiceController@Create');
Route::post('/orders', 'OrderController@Create');

Route::put('/clients', 'ClientController@Update');
Route::put('/services', 'ServiceController@Update');
Route::put('/orders', 'OrderController@Update');

Route::delete('/clients', 'ClientController@Delete');
Route::delete('/services', 'ServiceController@Delete');
Route::delete('/orders', 'OrderController@Delete');

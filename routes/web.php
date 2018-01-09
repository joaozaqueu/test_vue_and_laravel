<?php

Route::get('/', function () {
 return view('welcome');
});

Route::resource('items', 'ItemController');

Route::get('users', 'UsersController@index');

Route::get('api/users/list', 'UsersController@list');
Route::post('api/users/create', 'UsersController@create');
Route::get('api/users/{id}/edit', 'UsersController@edit');
Route::put('api/users/{id}/edit', 'UsersController@update');

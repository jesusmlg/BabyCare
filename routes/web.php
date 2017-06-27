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





Route::middleware('auth')->group(function(){
	Route::get('/','BabiesController@indexAction');
	Route::get('/babies', 'BabiesController@indexAction')->name('all_babies_path');
	Route::get('/baby/new', 'BabiesController@newAction')->name('new_baby_path');
	Route::get('/baby/create','BabiesController@createAction')->name('create_baby_path');
	Route::get('/baby/{id}/edit','BabiesController@editAction')->name('edit_baby_path');
	Route::post('/baby/{baby}/update','BabiesController@updateAction')->name('update_baby_path');
});
Auth::routes();
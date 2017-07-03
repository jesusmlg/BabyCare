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

Route::get('/im',function(){
	return Image::make('gris.jpg')->response();
});

Route::middleware('auth')->group(function(){
	Route::get('/','BabiesController@indexAction');
	Route::get('/home','BabiesController@indexAction');
	Route::get('/babies', 'BabiesController@indexAction')->name('all_babies_path');
	Route::get('/baby/new', 'BabiesController@newAction')->name('new_baby_path');
	Route::post('/baby/create','BabiesController@createAction')->name('create_baby_path');
	Route::get('/baby/{id}/edit','BabiesController@editAction')->name('edit_baby_path');
	Route::post('/baby/{baby}/update','BabiesController@updateAction')->name('update_baby_path');
	Route::delete('/baby/{baby}/delete','BabiesController@deleteAction')->name('delete_baby_path');
	Route::get('/baby/{baby}','BabiesController@showAction')->name('show_baby_path');

	//weight routes

	Route::get('/baby/{baby}/weights','WeightsController@indexAction')->name('all_weights_path');
	Route::get('/baby/{baby}/weights/new','WeightsController@newAction')->name('new_weight_path');
	Route::post('/baby/{baby}/weights/create','WeightsController@createAction')->name('create_weight_path');
});
Auth::routes();
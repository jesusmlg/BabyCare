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

Route::get('/photos/{baby}/thumb/{file}',function($baby,$file){
	$img = Storage::get(config('paths.baby_thumb')."/".$baby."/".$file);
	return Image::make($img)->response();
})->name('show_photothumb_path')->middleware('auth');

Route::get('/photos/{baby}/photo/{file}',function($baby,$file){
	$img = Storage::get(config('paths.baby_photo')."/".$baby."/".$file);
	return Image::make($img)->response();
})->name('show_photo_path')->middleware('auth');

Route::get('/avatar/{file}',function($file){
	$img = Storage::get(config('paths.baby_avatar').'/'.$file);
	return Image::make($img)->response();
})->name('show_avatar_path')->middleware('auth');

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

	//weights routes

	Route::get('/baby/{baby}/weights','WeightsController@indexAction')->name('all_weights_path');
	Route::get('/baby/{baby}/weights/new','WeightsController@newAction')->name('new_weight_path');
	Route::post('/baby/{baby}/weights/create','WeightsController@createAction')->name('create_weight_path');

	//vaccines routes

	Route::get('/vaccine/{baby}/vaccines','VaccinesController@indexAction')->name('all_vaccines_path');
	Route::get('/vaccine/{baby}/new','VaccinesController@newAction')->name('new_vaccine_path');
	Route::post('/vaccine/{baby}/create','VaccinesController@createAction')->name('create_vaccine_path');
	Route::delete('/baby/{baby}/vaccine/{vaccine}/delete','PhotosController@destroyAction')->name('delete_vaccine_path');

	//Photos routes

	Route::get('/photo/{baby}','PhotosController@indexAction')->name('all_photos_path');
	Route::get('/photo/{baby}/new','PhotosController@newAction')->name('new_photo_path');
	Route::post('/photo/{baby}/create','PhotosController@createAction')->name('create_photo_path');
	Route::delete('/baby/{baby}/photo/{photo}/delete','PhotosController@destroyAction')->name('delete_photo_path');
});
Auth::routes();
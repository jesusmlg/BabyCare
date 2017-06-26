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


Route:get('/')


Route::middleware('auth')->group(function(){
	Route::get('/babies', 'BabiesController@indexAction')->name('all_babies_path');
	Route::get('/baby/new', 'BabiesController@newAction')->name('new_baby_path');
});
Auth::routes();
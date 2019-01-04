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
    return View::make('pages.landing');
});

Route::get('about', function () {
	return View::make('pages.about');    
});

Route::get('contact', function () {
	return View::make('pages.contact');    
});

Route::get('services', function () {
	return View::make('pages.services');    
});

Route::resource('clubs', 'ClubController');

Route::post('clubs/updateData', 'ClubController@updateDataFunc');
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

// Static
Route::get('/', 'PageController@home');
Route::get('/home', 'PageController@home');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
Route::post('/contact', 'EmailController@contact');

Route::get('/phpinfo',function() {
	echo phpinfo();
});


// Dashboard
Route::get('/admin', 'PageController@dashboard');


// MODELS

// Categories
Route::get('/categories/admin', 'CategoryController@admin');
Route::resource('categories', 'CategoryController');

// Colors
Route::get('colors/admin', 'ColorController@admin');
Route::resource('colors', 'ColorController');

// Leathers
Route::group(['prefix' => 'leather'], function(){

	//admin 
	Route::get('/admin', 'LeatherController@admin');
	Route::get('/{leather}/add-photos', 'LeatherController@addPhotos');
	Route::delete('/{photo}/delete-photo', 'LeatherController@destroyPhoto');
	Route::post('/{leather}/upload-photos', 'LeatherController@uploadPhotos');
	Route::post('/{leather}/feature-photo/{photo}', 'LeatherController@setFeature');
	// Route::get('/category/{slug}', 'LeatherController@category');
	// Route::get('/color/{slug}', 'LeatherController@color');
});
Route::resource('leather', 'LeatherController');
Route::get('leather/{leather}/{slug?}', 'LeatherController@show');


Auth::routes();

Route::get('/register', function(){
	return back();
});
Route::post('/register', function(){
	return back();
});
Route::get('/logout', function(){
	Auth::logout();
	return back();
});


<?php

// Public Pages
Route::get('/', 'PageController@home');
Route::view('/terms', 'pages.terms');
Route::view('/credits', 'pages.credits');
Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');
Route::post('/contact', 'EmailController@contact');

// Checkout Process
Route::post('/bag', 'CartController@store'); // add an item to the cart
Route::get('/bag', 'CartController@index'); // show cart
Route::get('/shipping-details', 'ShippingDetailsController@create'); // form to get shipping details
Route::post('/shipping-details', 'ShippingDetailsController@store'); // store shipping details in session
Route::get('/orders/create', 'OrderController@create'); // confirm details and enter payment
Route::post('/orders', 'OrderController@store'); // make the payment and store the order
Route::get('/thank-you', 'OrderController@thankYou'); // after order stored

// ADMIN

// Dashboard
Route::get('/admin', 'PageController@dashboard');

// Categories
Route::get('/categories/admin', 'CategoryController@admin');
Route::resource('categories', 'CategoryController');

// Colors
Route::get('colors/admin', 'ColorController@admin');
Route::resource('colors', 'ColorController');

// Leather
Route::group(['prefix' => 'leather'], function(){
	Route::get('/admin', 'LeatherController@admin');
	Route::get('/{leather}/add-photos', 'LeatherController@addPhotos');
	Route::delete('/{photo}/delete-photo', 'LeatherController@destroyPhoto');
	Route::post('/{leather}/upload-photos', 'LeatherController@uploadPhotos');
	Route::post('/{leather}/feature-photo/{photo}', 'LeatherController@setFeature');
});
Route::resource('leather', 'LeatherController');
Route::get('leather/{leather}/{slug?}', 'LeatherController@show');

// Orders
Route::get('orders/admin', 'OrderController@admin');
Route::resource('orders', 'OrderController');

// Testimonials
Route::get('testimonials/admin', 'TestimonialController@admin');
Route::resource('testimonials', 'TestimonialController');

Auth::routes();

// don't let anyone make an account yet
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

// Route::get('/phpinfo',function() {
// 	echo phpinfo();
// });

<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });

// Guests Routes
Route::get('/', 'ApartmentController@index')->name('home');
Route::get('/apartments/{apartment}', 'ApartmentController@show')->name('apartments.show');
Route::post('/apartments/{apartment}', 'MessageController@store')->name('message.store');

// Auth routes
Auth::routes();

// Payment routes
Route::get('/payment/form', 'PaymentController@form')->name('payment.form');
Route::post('/payment/checkout/', 'PaymentController@checkout')->name('payment.checkout');


// Registered routes
Route::get('/registered', 'RegisteredController@index')->name('registered.index');
Route::get('/registered/messages', 'RegisteredController@messages')->name('registered.messages');
Route::name('registered.')
    ->prefix('registered')
    ->namespace('Registered')
    ->middleware('auth')
    ->group(function () {
        Route::get('/apartments/ads', 'BoughtAdController@index')->name('ads.index');
        Route::get('/apartments/ads/{apartment}', 'BoughtAdController@create')->name('ads.create');
        Route::post('/apartments/ads', 'BoughtAdController@validationForm')->name('ads.validationform');
        // Route::post('/apartments/ads', 'BoughtAdController@store')->name('ads.store');
        Route::resource('views', 'ViewController');
        // Route::resource('ads', 'AdController');
        // Route::resource('boughtAds', 'BoughtAdController');
        // Route::resource('features', 'FeatureController');
        // Route::resource('images', 'ImageController');
        // Route::resource('roles', 'RoleController');
        Route::resource('apartments', 'ApartmentController');
    });

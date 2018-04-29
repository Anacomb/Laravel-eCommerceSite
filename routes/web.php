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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/packs/{slug}', 'HomeController@details')->name('pack-details');

Route::get('/add-to-cart/{packID}', 'HomeController@addToCart')->name('cart-addToCart');
Route::get('/cart', 'HomeController@showCart')->name('cart-showCart');
Route::get('/removeFromCart/{productId}', 'HomeController@removeFromCart')->name('cart-delete');
Route::get('/banGame', 'HomeController@banGame')->name('cart-banGame');

Route::get('/proceedPayment', 'HomeController@proceedPayment')->name('payment-proceedPayment');
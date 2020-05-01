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



Route::get('/', 'PizzaController@showPizzas')->name('showpizza');

Route::get('/shopping-cart', 'PizzaController@shoppingCart')->name('shoppingCart');

Route::get('add-to-cart/{id}', 'PizzaController@getAddToCart')->name('getAddToCart');

Route::get('/checkout', 'PizzaController@checkout')->name('checkout')->middleware('auth');

Route::post('/dashboard', 'PizzaController@addPizza')->name('addpizza');

Route::get('/payment-successful', 'PizzaController@payment')->name('payment')->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');



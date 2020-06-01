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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/news', 'NewsController@index')->name('news');


Route::get('/cart}', 'CartController@index')->name('cart');
Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('product.addToCart');
Route::get('/reduce-one-from-cart/{id}', 'CartController@reduceOneFromCart')->name('product.reduceOneFromCart');
Route::get('/remove-from-cart/{id}', 'CartController@removeFromCart')->name('product.removeFromCart');
Route::get('/orders/finished', 'OrdersController@storeOrder')->name('orders.storeOrder');


Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::resource('orders', 'OrdersController');

Route::get('/my-orders', 'OrdersController@myOrders')->name('orders.myOrders');
Route::get('/offers', 'ProductsController@offers')->name('offers');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth', 'role'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('users', 'UsersController')->only(['index', 'show']);
    Route::resource('news', 'NewsController');
    Route::resource('products', 'ProductsController')->except('show');
    Route::resource('brands', 'BrandsController')->except('show');
    Route::resource('categories', 'CategoriesController')->except('show');
    Route::resource('offers', 'OffersController')->except('show');
    Route::resource('faqs', 'FaqsController')->except('show');

});

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
Route::get('/buy-now/{id}', 'CartController@buyNow')->name('product.buyNow');
Route::get('/reduce-one-from-cart/{id}', 'CartController@reduceOneFromCart')->name('product.reduceOneFromCart');
Route::get('/remove-from-cart/{id}', 'CartController@removeFromCart')->name('product.removeFromCart');


Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::get('/add-to-favourite/{id}', 'ProductsController@addToFavourite')->name('product.addToFavourite');
Route::get('/offers', 'ProductsController@offers')->name('offers');
Route::get('/favourite', 'ProductsController@favourite')->name('product.favourite');
Route::put('/remove-favourite/{id}', 'ProductsController@removeFavourite')->name('product.removeFavourite');
Route::get('/valuate/{id}', 'ProductsController@valuate')->name('product.valuate');
Route::post('/add-valuation/{id}', 'ProductsController@addValuation')->name('product.addValuation');

Route::resource('orders', 'OrdersController');
Route::get('/my-orders', 'OrdersController@myOrders')->name('orders.myOrders');
Route::get('/order/finished', 'OrdersController@storeOrder')->name('order.storeOrder');

Route::resource('faqs', 'FaqsController')->only('index');
Route::resource('contact', 'ContactController')->only('index');
Route::post('/contact', 'ContactController@contactSend')->name('contactSend');

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
    Route::resource('orders', 'OrdersController')->only(['index', 'show']);

});

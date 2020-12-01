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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', 'ProductController@index')->name('allProduct');
Route::get('product/addToCart/{id}' , 'ProductController@addProductToCart')->name('addToCart');
Route::get('product/deleteItemFromCart/{id}' , 'ProductController@deleteItemFromCart')->name('deleteItemFromCart');

Route::get('cart', 'ProductController@showCart')->name('cartProducts');

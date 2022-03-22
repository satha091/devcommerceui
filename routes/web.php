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
//     return view('home');
// });
Route::get('/', 'HomeController@index')->name('allproduct');
Route::get('/login', 'LoginController@index')->name('home');
Route::get('/register', 'RegisterController@index')->name('register');;
Route::get('getsubcat/{id}','HomeController@getsubcat')->name('getsubcat.ajax');
Route::get('product/{id}','HomeController@show')->name('product');
Route::get('product','ProductController@index')->name('product.index');
Route::get('variant/{id}','ProductController@show')->name('variant');

Route::get('checkout','CheckoutController@index')->name('checkout');

Route::get('shopping','ShoppingController@index')->name('shopping');

Route::get('getitemvar/{id}','ItemvaiantController@getitemvar')->name('getitemvar.ajax');
Route::post('/login', 'LoginController@login');

Route::post('/register', 'RegisterController@storeregistration');


Route::get('/logout', 'LoginController@logout')->name('logout');

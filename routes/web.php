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

Route::get('/', "HomeController@index")->name("home");
// product routes
Route::get('/produits', "ProductsController@index")->name("produits");
Route::post('/produits', "ProductsController@search")->name("produits.search");
// promo routes
Route::get('/promos', "HomeController@index")->name("promos");
// contact-us routes
Route::get('/contacter-nous', "ContactController@index")->name("contact-us");
Route::post('/contacter-nous', "ContactController@store")->name("contact-us.store");

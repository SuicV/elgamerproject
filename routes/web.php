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
Route::get('/produits', "HomeController@index")->name("produits");
Route::get('/promos', "HomeController@index")->name("promos");
Route::get('/contacter-nous', "ContactController@index")->name("contact-us");
Route::post('/contacter-nous', "ContactController@store")->name("contact-us.store");

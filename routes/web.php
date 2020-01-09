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
Route::get('/produits/{id}', "ProductsController@get")->name("produits.get")->where(["id"=>"[0-9]+"]);
// chart routes
Route::get('/panier', "ChartController@index")->name("chart");
Route::post('/panier',"ChartController@store")->name("chart.store");
Route::delete('/panier/{id}', "ChartController@destroy")->name("chart.destroy")->where(["id"=>"^[0-9]+$"]);
// purchase routes
Route::get("/commander","PurchaseController@index")->name("purchase");
Route::post("/commander","PurchaseController@store")->name("purchase");
// contact-us routes
Route::get('/contacter-nous', "ContactController@index")->name("contact-us");
Route::post('/contacter-nous', "ContactController@store")->name("contact-us.store");
// comments routes
Route::put("/comment", "CommentsController@store")->name("comments.store");
Route::post("/comment/{id}", "CommentsController@get")->name("comments.get")->where(["id"=>"^[0-9]+$"]);
// register routes
Route::get("/inscription", "Auth\RegisterController@get")->name("register.get");
Route::post("/inscription", "Auth\RegisterController@store")->name("register.store");
// login routes
Route::get("/se-connecter", "Auth\LoginController@get")->name("login.get");
// logout routes
Route::get("/deconnecter", "Auth\LoginController@logout")->name("logout");
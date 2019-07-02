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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about','ContentAboutController@about');
Route::get('addabout','ContentAboutController@addabout');
Route::post('addabout','ContentAboutController@storeabout');
Route::get('shop','ShopController@products');
Route::get('shop/details/{id}','ShopController@productdetails');
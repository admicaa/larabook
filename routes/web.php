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
Route::get('/timesystems','TimesystemController@show');
Route::get('/','ProductController@index')->name('home');
Route::post('/getnewtimesystem','TimesystemController@viewToReview');
Route::post('/storeNewTimeSystem','TimesystemController@storeNew');
Route::get('/register','UserController@register');
Route::post('/register','UserController@store');
Route::get('/logout','SessionController@destroy');
Route::get('/login','SessionController@login')->name('login');
Route::post('/login','SessionController@store');
Route::get('/user/profile','UserController@index');
Route::get('/add-to-cart/{id}','ProductController@getAddCart');
Route::get('/cart','ProductController@getCart');
Route::get('/checkout','ProductController@getcheckOut');
Route::post('/checkout','ProductController@postcheckOut');
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

Route::get('/','ProductController@getAllFont')->name('shop.list');
Route::get('/{id}/add-to-cart','CartController@addToCart')->name('carts.addToCart');
Route::get('/list-cart','CartController@getAll')->name('carts.list');

Route::get('FormRegister','AuthController@showFormRegister')->name('auth.showFormRegister');
Route::post('FormRegister','AuthController@register')->name('auth.register');
Route::get('FormLogin','AuthController@showFormLogin')->name('login');
Route::post('FormLogin','AuthController@login')->name('auth.login');
Route::get('logout','AuthController@logout')->name('auth.logout');


Route::middleware('auth')->prefix('categories')->group(function (){
    Route::get('/','CategoryController@getAll')->name('categories.list');
    Route::get('/add','CategoryController@showFormAdd')->name('categories.showFormAdd');
    Route::post('/add','CategoryController@addCategory')->name('categories.addCategory');
    Route::get('/{id}/edit','CategoryController@showFormEdit')->name('categories.showFormEdit');
    Route::post('/{id}/edit','CategoryController@edit')->name('categories.edit');
});
Route::middleware('auth')->prefix('products')->group(function (){
    Route::get('/','ProductController@getAll')->name('products.list');
    Route::get('/add','ProductController@showFormAdd')->name('products.showFormAdd');
    Route::post('/add','ProductController@addProduct')->name('products.addProduct');
    Route::get('/{id}/edit','ProductController@showFormEdit')->name('products.showFormEdit');
    Route::post('/{id}/edit','ProductController@edit')->name('products.edit');
    Route::get('/{id}/delete','ProductController@delete')->name('products.delete');
});
Route::middleware('auth')->prefix('customers')->group(function (){
    Route::get('/','CustomerController@getAll')->name('customers.list');
    Route::get('/{id}/edit','CustomerController@showFormEdit')->name('customers.showFormEdit');
    Route::post('/{id}/edit','CustomerController@edit')->name('customers.edit');
});


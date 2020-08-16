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

Route::prefix('categories')->group(function (){
    Route::get('/','CategoryController@getAll')->name('categories.list');
    Route::get('/add','CategoryController@showFormAdd')->name('categories.showFormAdd');
    Route::post('/add','CategoryController@addCategory')->name('categories.addCategory');
    Route::get('/{id}/edit','CategoryController@showFormEdit')->name('categories.showFormEdit');
    Route::post('/{id}/edit','CategoryController@edit')->name('categories.edit');
});
Route::prefix('products')->group(function (){
    Route::get('/','ProductController@getAll')->name('products.list');
    Route::get('/add','ProductController@showFormAdd')->name('products.showFormAdd');
    Route::post('/add','ProductController@addProduct')->name('products.addProduct');
    Route::get('/{id}/edit','ProductController@showFormEdit')->name('products.showFormEdit');
    Route::post('/{id}/edit','ProductController@edit')->name('products.edit');
    Route::get('/{id}/delete','ProductController@delete')->name('products.delete');
});
Route::prefix('customers')->group(function (){
    Route::get('/','CustomerController@getAll')->name('customers.list');
});

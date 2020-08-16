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
    Route::get('/add','CategoryController@showFormAdd')->name('categories.ShowFormAdd');
    Route::post('/add','CategoryController@addCategory')->name('categories.addCategory');
});

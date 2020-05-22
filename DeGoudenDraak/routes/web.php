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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/menu', 'MenuController@index');
Route::get('/news', 'NewsController@index');
Route::get('/contact', 'ContactController@index');
Route::get('/offers', 'OffersController@index');
Route::get('/option', 'OrderController@index');

//customer
Route::get('/tablenumber', 'CustomerController@index');
Route::post('/tablenumber', 'CustomerController@store');

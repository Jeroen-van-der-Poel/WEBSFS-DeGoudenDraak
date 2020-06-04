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
Route::get('/auth/unauthorized', 'UnauthorizedController@index');

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

//customer order
Route::get('/customer-order/{id}', 'CustomerOrderController@index');

Route::post('/customer-order/order/{id}', 'CustomerOrderController@store');
Route::post('/customer-order/{id}', 'CustomerOrderController@help');

//employee
Route::get('/cashregister/index', 'CashRegisterController@index');
Route::post('/cashregister/index', 'CashRegisterController@store');
Route::get('/cashregister/dishes', 'DishesController@index');
Route::patch('/FilterCashRegisterDishes','CashRegisterController@filterDishes');
Route::patch('/FilterCashRegisterCategories','CashRegisterController@filterCategories');

// Routes only able to be used by Admin
Route::group(['middleware' => 'admin'], function() {
    Route::get('/cashregister/users', 'UsersController@index');
    Route::post('/cashregister/users', 'UsersController@store');
    Route::delete('/cashregister/users/{user}', 'UsersController@destroy');
});

// Routes only able to be used by Waitress
Route::group(['middleware' => 'waitress'], function() {
    Route::get('/cashregister/alerts', 'AlertsController@index');
    Route::put('/cashregister/alerts/finish-alert/{id}', 'AlertsController@update');
});

// Routes only able to be used by Cashier
Route::group(['middleware' => 'cashier'], function() {
    Route::get('/cashregister/sales', 'SalesController@index');
    Route::patch('/FilterSales', 'SalesController@filterSales');
});

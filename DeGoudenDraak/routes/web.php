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
Route::get('/pdf', 'PdfController@generate');
Route::get('/news', 'NewsController@index');
Route::get('/contact', 'ContactController@index');
Route::get('/offers', 'OffersController@index');
Route::get('/option', 'OrderController@index');

//customer
Route::get('/tablenumber', 'CustomerController@index');
Route::post('/tablenumber', 'CustomerController@store');
Route::get('/homeorder', 'CustomerController@homeindex');
Route::post('/homeorder', 'CustomerController@homestore');

//customer order
Route::get('/customer-order/{id}', 'CustomerOrderController@index');
Route::post('/customer-order/order/{id}', 'CustomerOrderController@store');
Route::post('/customer-order/{id}', 'CustomerOrderController@help');

//customer home order
Route::get('/home-order/{id}', 'HomeOrderController@index');
Route::post('/home-order/order/{id}', 'HomeOrderController@store');
Route::get('/home-order/{id}/confirmation', 'HomeOrderController@confirmation')->name('confirmation');

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
    Route::get('/cashregister/users/remove-admin/{user}', 'UsersController@removeAdmin');
    Route::get('/cashregister/users/give-admin/{user}', 'UsersController@giveAdmin');
    Route::get('/cashregister/users/remove-cashier/{user}', 'UsersController@removeCashier');
    Route::get('/cashregister/users/give-cashier/{user}', 'UsersController@giveCashier');
    Route::get('/cashregister/users/remove-waitress/{user}', 'UsersController@removeWaitress');
    Route::get('/cashregister/users/give-waitress/{user}', 'UsersController@giveWaitress');
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

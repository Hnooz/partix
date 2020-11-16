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

Auth::routes(['register' => true, 'confirm' => false, 'reset' => false]);

Route::redirect('/', '/dashboard');

Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');

    Route::resource('users', 'UserController');
    // Route::get('/users', 'UserController@index')->name('users.index');
    // Route::get('/users/create', 'UserController@create')->name('users.create');
    // Route::post('/users', 'UserController@store')->name('users.store');
    // Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    // Route::put('/users/{user}', 'UserController@update')->name('users.update');
    // Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/coupons', 'CouponCodeController@index')->name('coupons.index');
    Route::get('/comments', 'CommentController@index')->name('comments.index');
    //fuck this bitch
    // category route
    Route::resource('categories', 'CategoryController');
});

Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/items', 'CategoryController@items')->name('categories.items');
Route::get('/details', 'CategoryController@details')->name('categories.details');
Route::get('/cart', 'CategoryController@cart')->name('categories.cart');

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
    // user route 
    Route::resource('users', 'UserController');

    // orders route 
    Route::get('/orders', 'OrderController@index')->name('orders.index');

    // coupons route 
    Route::get('/coupons', 'CouponCodeController@index')->name('coupons.index');

    // comments route 
    Route::get('/comments', 'CommentController@index')->name('comments.index');

    // category route
    Route::resource('categories', 'CategoryController');
    // part route
    Route::resource('parts', 'PartController');
    //exports
    Route::get('/parts/export', 'ExportController@parts');
});

Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/items', 'CategoryController@items')->name('categories.items');
Route::get('/details', 'CategoryController@details')->name('categories.details');
Route::get('/cart', 'CategoryController@cart')->name('categories.cart');

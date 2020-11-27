<?php

use Illuminate\Support\Facades\Route;

Route::get('language/{language}', 'LangController@lang')->name('language');

Auth::routes(['register' => true, 'confirm' => false, 'reset' => false]);

Route::redirect('/', '/dashboard');

Route::middleware('auth')->prefix('/dashboard')->group(function () {
    // dashboard 
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');
    // user route 
    Route::get('users/export/', 'ExportController@users');
    Route::resource('users', 'UserController');
    
    // orders route 
    Route::get('/orders', 'OrderController@index')->name('orders.index');

    // coupons route 
    Route::resource('coupons', 'CouponCodeController')->except(['show','create']);

    // comments route 
    Route::get('/comments', 'CommentController@index')->name('comments.index');

    // category route
    Route::resource('categories', 'CategoryController');

    // part route
    Route::get('parts/export', 'ExportController@parts');
    Route::resource('parts', 'PartController');

    Route::resource('cars', 'CarController');
});

Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/items', 'StoreController@items')->name('store.items');
Route::get('/details', 'StoreController@details')->name('store.details');
Route::get('/cart', 'CategoryController@cart')->name('categories.cart');

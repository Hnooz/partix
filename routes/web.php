<?php

use Illuminate\Support\Facades\Route;

Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);
 
    return redirect()->back();
})->name('language');

Auth::routes(['register' => true, 'confirm' => false, 'reset' => false]);

Route::redirect('/', '/dashboard');

Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');
    // user route 
    Route::get('users/export/', 'ExportController@users');
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
    Route::get('parts/export', 'ExportController@parts');
    Route::resource('parts', 'PartController');
    //exports
    
});

Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/items', 'CategoryController@items')->name('categories.items');
Route::get('/details', 'CategoryController@details')->name('categories.details');
Route::get('/cart', 'CategoryController@cart')->name('categories.cart');

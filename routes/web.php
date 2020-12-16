<?php

use Illuminate\Support\Facades\Route;

Route::get('language/{language}', 'LangController@lang')->name('language');

Auth::routes(['register' => true, 'confirm' => false, 'reset' => false]);

Route::redirect('/', '/dashboard');

Route::group(['middleware' => ['is_delivery'], 'prefix' => '/dashboard'], function () {
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{order}/edit', 'OrderController@edit')->name('orders.edit');
    Route::put('/orders/{order}', 'OrderController@update')->name('orders.update');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    Route::get('/order_total_price', 'OrderController@getTotalPrice')->name('orders.total');
});

Route::middleware('is_admin')->prefix('/dashboard')->group(function () {
    // dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');
    // user route
    Route::get('users/export/', 'ExportController@users');
    Route::resource('users', 'UserController');
    
    Route::resource('suppliers', 'SupplierController')->except(['show','create','edit']);
    // orders route
    // Route::get('/orders', 'OrderController@index')->name('orders.index');

    // coupons route
    Route::resource('coupons', 'CouponCodeController')->except(['show','create']);

    // comments route
    Route::get('/comments', 'CommentController@index')->name('comments.index');

    // category route
    Route::resource('super_categories', 'SuperCategoryController')->except(['show']);
    Route::resource('categories', 'CategoryController');

    // part route
    Route::get('parts/export', 'ExportController@parts');
    Route::resource('parts', 'PartController');
    
    Route::resource('cars', 'CarController');
});
Route::post('/orders', 'OrderController@store')->name('orders.store');
Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/categories', 'StoreController@category')->name('store.category');
Route::get('/items', 'StoreController@items')->name('store.items');
Route::get('/items/{category}', 'StoreController@categoryItems')->name('store.categoryItems');
Route::get('/details/{part}', 'StoreController@details')->name('store.details');
Route::post('/search', 'StoreController@search')->name('store.search');

Route::get('/filtered_part/{id}', 'FilterController@getFilteredParts')->name('filtered_part');
Route::post('/filtered_parts', 'FilterController@filteredParts')->name('filtered_parts');
Route::get('/get_brands', 'FilterController@fetchBrands')->name('brands');
Route::get('/get_models', 'FilterController@fetchModels')->name('models');
Route::get('/get_years', 'FilterController@fetchYears')->name('years');
Route::get('/get_engines', 'FilterController@fetchEngines')->name('engines');
// cart
Route::get('/carts', 'CartController@index')->name('carts.index');
Route::post('/carts', 'CartController@store')->name('carts.store');
Route::put('/cart/{id}', 'CartController@update')->name('carts.update');
Route::delete('/cart', 'CartController@destroy')->name('carts.destroy');
Route::delete('/clear', 'CartController@clear')->name('carts.clear');

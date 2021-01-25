<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('language/{language}', 'LanguageController@show')->name('language');

Auth::routes(['register' => false, 'confirm' => false, 'reset' => false]);

Route::redirect('/', '/store');

// delivery route
Route::group(['middleware' => 'is_delivery', 'prefix' => '/dashboard'], function () {
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{order}/edit', 'OrderController@edit')->name('orders.edit');
    Route::put('/orders/{order}', 'OrderController@update')->name('orders.update');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    Route::delete('orders/{order}', 'OrderController@destroy')->name('orders.destroy');
});

//dashboard route
Route::middleware('is_admin')->prefix('/dashboard')->group(function () {
    // dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    // user route
    Route::get('users/export/', 'ExportController@users');
    Route::resource('users', 'UserController');
    
    //supplier route
    Route::post('suppliers/import', 'ImportController@suppliers')->name('suppliers.import');
    Route::resource('suppliers', 'SupplierController')->except(['show','create','edit']);

    // coupons route
    Route::resource('coupons', 'CouponCodeController')->except(['show']);

    // category route
    Route::resource('super_categories', 'SuperCategoryController')->except(['show']);
    Route::resource('categories', 'CategoryController');

    // part route
    Route::post('parts/import', 'ImportController@parts')->name('parts.import');
    Route::get('parts/export', 'ExportController@parts')->name('parts.export');
   
    Route::resource('parts', 'PartController')->except('show');
    Route::get('parts/{slug}', 'PartController@show')->name('parts.show');
    //cars and brands
    Route::post('brands/import', 'ImportController@brands')->name('brands.import');
    Route::get('brands/{brand}/cars/create', 'BrandCarsController@show')->name('brands.cars');
    Route::post('brands/{brand}/cars', 'BrandCarsController@store')->name('brands.cars.store');
    Route::resource('brands', 'BrandController');
    Route::post('cars/import', 'ImportController@cars')->name('cars.import');
    Route::resource('cars', 'CarController');
});

// store route
Route::group(['prefix' => 'store'], function () {
    Route::get('/', 'StoreController@index')->name('store.index');
    Route::get('/items', 'StoreController@items')->name('store.items');
    Route::get('/items/{category}', 'StoreController@categoryItems')->name('store.categoryItems');
    
    Route::post('/orders', 'OrderController@store')->name('orders.store');
    Route::post('/orders/zeroprice', 'OrderController@storeZeroPriceOrder')->name('orders.storeZeroPriceOrder');
    Route::get('/details/{part}', 'StoreController@details')->name('store.details');
    Route::post('/search', 'StoreController@search')->name('store.search');
    Route::get('/404', 'StoreController@notfound')->name('store.notfound');
    
    // filter route
    Route::get('/filtered_part/{id}', 'FilterController@getFilteredParts')->name('filtered_part');
    Route::post('/filtered_parts', 'FilterController@filteredParts')->name('filtered_parts');
    Route::get('/get_brands', 'FilterController@fetchBrands')->name('brands');
    Route::get('/get_models', 'FilterController@fetchModels')->name('models');
    Route::get('/get_years', 'FilterController@fetchYears')->name('years');
    Route::get('/get_engines', 'FilterController@fetchEngines')->name('engines');

    //cart route
    Route::get('/carts', 'CartController@index')->name('carts.index');
    Route::post('/carts', 'CartController@store')->name('carts.store');
    Route::put('/cart/{id}', 'CartController@update')->name('carts.update');
    Route::delete('/carts/{id}', 'CartController@remove')->name('carts.remove');
    Route::delete('/clear', 'CartController@clear')->name('carts.clear');

    Route::group(['prefix' => 'wishlist'], function () {
        Route::get('/', 'WishListController@index')->name('wishlist.index');
        Route::post('/', 'WishListController@add')->name('wishlist.add');
        Route::get('/details', 'WishListController@details')->name('wishlist.details');
        Route::delete('/{id}', 'WishListController@remove')->name('wishlist.remove');
    });
});

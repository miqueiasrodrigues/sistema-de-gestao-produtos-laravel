<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', 'ProductController@index')->name('site.products');
Route::get('/suppliers', 'SupplierController@index')->name('site.suppliers');
Route::prefix('auth')->group(function () {
    Route::get('/signin', 'LoginController@index')->name('auth.signin');
    Route::prefix('form')->group(function () {
        Route::get('/product', 'ProductController@form')->name('auth.form.product');
        Route::get('/product/edit', 'ProductController@edit')->name('auth.form.product.edit');
        Route::get('/product/delete', 'ProductController@delete')->name('auth.form.product.delete');
        Route::post('/product', 'ProductController@form')->name('auth.form.product');
        Route::post('/product/edit', 'ProductController@edit')->name('auth.form.product.edit');

        Route::get('/supplier', 'SupplierController@form')->name('auth.form.supplier');
        Route::get('/supplier/delete', 'SupplierController@delete')->name('auth.form.supplier.delete');
        Route::get('/supplier/edit', 'SupplierController@edit')->name('auth.form.supplier.edit');
        Route::post('/supplier', 'SupplierController@form')->name('auth.form.supplier');
        Route::post('/supplier/edit', 'SupplierController@edit')->name('auth.form.supplier.edit');
    });
});

Route::redirect('/', '/products');


Route::redirect('/login', 'auth/signin');
Route::redirect('/signin', 'auth/signin');

Route::fallback(function () {
    return 'Not Found';
});

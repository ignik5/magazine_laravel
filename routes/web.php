<?php

Route::get('/', 'maincontroller@index')->name('index');

Route::get('/categories', 'maincontroller@categories')->name('categories');

Route::get('/basket','BasketController@basket')->name('basket');
Route::get('/basket/place','BasketController@basketplace')->name('basketplace');
Route::post('/basket/add/{id}', 'BasketController@basketadd' )->name('basketadd');



Route::get('/{category}', 'maincontroller@category')->name('category');

Route::get('/{category}/{product?}','maincontroller@product')->name('product');

 
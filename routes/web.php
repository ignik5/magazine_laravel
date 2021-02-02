<?php

Route::get('/', 'maincontroller@index')->name('index');

Route::get('/categories', 'maincontroller@categories')->name('categories');

Route::get('/basket','maincontroller@basket')->name('basket');
Route::get('/basket/place','maincontroller@basketplace')->name('basketplace');
Route::get('/{category}', 'maincontroller@category')->name('category');

Route::get('/{category}/{product?}','maincontroller@product')->name('product');

 
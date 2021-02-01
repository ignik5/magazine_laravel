<?php

Route::get('/', 'maincontroller@index');

Route::get('/categories', 'maincontroller@categories');
Route::get('/{category}', 'maincontroller@category');

Route::get('/mobiles/{product?}','maincontroller@product');
 
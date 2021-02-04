<?php
Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);
Route::get('logout','Auth\LoginController@logout')->name('get-logout');
Route::get('/', 'maincontroller@index')->name('index');
Route::group([
    'middleware'=>'auth',
    'namespace'=>'Admin'

],function(){
    
Route::get('order','OrderController@index')->name('order');
});




Route::get('/categories', 'maincontroller@categories')->name('categories');

Route::get('/basket','BasketController@basket')->name('basket');
Route::get('/basket/place','BasketController@basketplace')->name('basketplace');
Route::post('/basket/add/{id}', 'BasketController@basketadd' )->name('basketadd');
Route::post('/basket/remov/{id}', 'BasketController@basketremov' )->name('basketremov');


Route::post('/basket/place','BasketController@basketconfirs')->name('basketconfirs');

Route::get('/{category}', 'maincontroller@category')->name('category');

Route::get('/{category}/{product?}','maincontroller@product')->name('product');

 
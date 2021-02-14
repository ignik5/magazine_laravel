<?php
route::group([
   
    'prefix'=>'basket',
],
function(){
 Route::post('/add/{id}', 'BasketController@basketadd' )->name('basketadd');
route::group([
     'middleware'=>'basket_not_empty',
    
],
function(){
       Route::get('/','BasketController@basket')->name('basket');
       Route::get('/place','BasketController@basketplace')->name('basketplace');
      
       Route::post('/remov/{id}', 'BasketController@basketremov' )->name('basketremov');
       Route::post('/place','BasketController@basketconfirs')->name('basketconfirs');

});
});
Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);
Route::get('logout','Auth\LoginController@logout')->name('get-logout');
Route::get('/', 'maincontroller@index')->name('index');
Route::group([
    'middleware'=>'auth',
], function () {
    Route::group([
        'prefix' => 'person',
        'namespace' => 'Person',
        'as' => 'person.',
    ], function () {
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
});
Route::group([
    'namespace'=>'Admin',
    'prefix'=>'admin'

],function(){
    Route::group(['middleware'=>'is_admin'],function(){
Route::get('order','OrderController@index')->name('order');

Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
});
Route::resource('categories', 'CategoryController');

Route::resource('products', 'productController');
});});



Route::get('/categories', 'maincontroller@categories')->name('categories');


Route::get('/{category}', 'maincontroller@category')->name('category');
 

Route::get('/{category}/{product?}','maincontroller@product')->name('product');

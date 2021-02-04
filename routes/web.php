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
    'namespace'=>'Admin'

],function(){
    Route::group(['middleware'=>'is_admin'],function(){
Route::get('order','OrderController@index')->name('order');
});
});



Route::get('/categories', 'maincontroller@categories')->name('categories');



Route::get('/{category}/{product?}','maincontroller@product')->name('product');

Route::get('/{category}', 'maincontroller@category')->name('category');
 
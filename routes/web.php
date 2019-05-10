<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  'OrderProductController@list');

Route::resource('toship', 'AddressController');
Route::resource('tocheck', 'AddressController');
Route::resource('tocomplete', 'AddressController');
Route::resource('tocheckfail', 'AddressController');
Route::resource('order', 'AddressController');
Route::get('orderlist', 'OrderProductController@list');
Route::post('order/edit', 'AddressController@editimage');
Route::get('statistic', 'OrderProductController@statistic');
Route::get('product', 'ProductController@index');


Route::resource('orderproduct', 'OrderProductController');
/*
GET, POST , PATCH, DESTROY, PUT
*/
Route::get('/search','SearchController@search');
Route::get('orderregisterdata','TestController@index');


Route::get('customerlist', 'AddressController@list');

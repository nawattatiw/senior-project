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

Route::get('/', function () {
    return view('welcome');
});
Route::get('testcodesu', function () {
    return view('layout.codeready');
});
Route::resource('/order', 'AddressController');
Route::resource('product', 'ProductController');
Route::resource('orderproduct', 'OrderProductController');
/*
GET, POST , PATCH, DESTROY, PUT
*/
Route::get('/search','SearchController@search');
Route::get('orderregisterdata','TestController@index');

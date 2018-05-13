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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::get('/', 'IndexController@index');
Route::get('/contact', 'IndexController@contact');
Route::get('/index', 'IndexController@index');
Route::get('/product', 'ProductController@index')->name('productAll');
Route::get('/product/{id}', 'IndexController@show');
Route::get('/cart', 'CartController@index');



Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function(){
    Route::get('/', 'Admin\AuthController@index')->name('adminProduct');

    Route::post('/product/{id}', 'Admin/AuthController@show')->name('adminProductOne');
    Route::post('/edit', 'Admin/AuthController@store')->name('adminProductEdit');
    Route::post('/delate', 'Admin/AuthController@destroy')->name('adminProductDelate');
   /* Route::post('/ex', 'Admin\AuthController@ex')->name('ex');*/
    Route::get('/parse', 'Admin\BackService\excel\ExcelController@parse')->name('readExcel');
    Route::get('/write', 'Admin\BackService\excel\ExcelController@write')->name('excelWrite');

});

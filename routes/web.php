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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/products/{catedories?}/{id?}', 'ProductController@index')->name('productAll');
Route::get('product/{id}', ['uses' => 'ProductController@show', 'as' => 'productOne'] );

//Route::get('articles/cat/{cat_alias?}', ['uses' => 'ArticleController@index', 'as' => 'articlesCat' ] )->where('cat_alias', '[\w-]+');
Route::get('/contact', 'ContactController@index')->name('contacts');
Route::get('/delivery', 'DeliveryController@index')->name('delivery');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/send_request/', 'CartController@sendRequest')->name('sendRequest');

Route::post('/by/{id?}', 'CartController@by')->name('cartBy');
Route::post('/search/{search?}', 'ProductController@search')->name('searchProduct');





Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function(){
    Route::get('/',               'Admin\ProductController@index')->name('adminProduct');
    Route::get('/editProduct',    'Admin\ProductController@editProduct')->name('editProduct');
    Route::post('/deleteProduct', 'Admin\ProductController@editProduct')->name('deleteProduct');
    Route::get('/add/product',    'Admin\ProductController@addProduct')->name('addProduct');
    Route::post('/add/product',   'Admin\ProductController@addProduct')->name('saveProduct');
    //Route::post('/add/photo',   'Admin\ImageController@uploadPhoto')->name('uploadPhoto');
    Route::get('/image',          'Admin\ImageController@index')->name('indexImage');
    Route::get('/upload/image',   'Admin\ImageController@uploadImage')->name('uploadImage');
    Route::post('/upload/image',  'Admin\ImageController@uploadImage')->name('uploadImage');
    Route::get('/upload/excel',   'Admin\ProductController@uploadExcelFile')->name('uploadFileForm');

    Route::get('/order',          'Admin\OrderController@index')->name('OrderIndex');

    Route::get('/settings',       'Admin\SiteController@settings')->name('settings');

    Route::post('/parse',         'Admin\BackService\excel\ExcelController@parse')->name('readExcel');
    Route::get('/write',          'Admin\BackService\excel\ExcelController@write')->name('excelWrite');





    Route::post('/product/{id}', 'Admin/AuthController@show')->name('adminProductOne');
    Route::post('/edit', 'Admin/AuthController@store')->name('adminProductEdit');
    Route::post('/delate', 'Admin/AuthController@destroy')->name('adminProductDelate');
   /* Route::post('/ex', 'Admin\AuthController@ex')->name('ex');*/


});

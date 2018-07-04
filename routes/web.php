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
    Route::get('/',                  'Admin\ProductController@index')->name('adminProduct');
    Route::get('/editProduct/{id?}', 'Admin\ProductController@editProduct')->name('editProduct');
    Route::post('/editProduct',      'Admin\ProductController@editProduct')->name('updateProduct');
    Route::get('/newProduct',        'Admin\ProductController@newProduct')->name('newProduct');
    Route::post('/newProduct',       'Admin\ProductController@newProduct')->name('newProduct');
    Route::get('/deleteProduct',     'Admin\ProductController@deleteProduct')->name('deleteProduct');
    Route::POST('/deleteAllProduct', 'Admin\ProductController@deleteAllProduct')->name('deleteAllProduct');
    Route::get('/add/product',       'Admin\ProductController@newProduct')->name('newProduct');
    Route::post('/add/product',      'Admin\ProductController@newProduct')->name('newProduct');
   /* Route::post('/add/product',    'Admin\ProductController@addProduct')->name('saveProduct');*/
    //Route::post('/add/photo',      'Admin\ImageController@uploadPhoto')->name('uploadPhoto');
    Route::get('/image',             'Admin\ImageController@index')->name('indexImage');
    Route::get('/unused/image',      'Admin\ImageController@unusedImage')->name('unusedImage');
    Route::post('/unused/image',     'Admin\ImageController@unusedImage')->name('unusedImage');
    Route::get('/upload/image',      'Admin\ImageController@uploadImage')->name('uploadImage');
    Route::post('/upload/image',     'Admin\ImageController@uploadImage')->name('uploadImage');
    Route::get('/upload/excel',      'Admin\ProductController@uploadExcelFile')->name('uploadFileForm');

    Route::get('/order',             'Admin\OrderController@index')->name('OrderIndex');
    Route::get('/order/new',         'Admin\OrderController@newOrder')->name('OrderNew');
    Route::get('/order/show/{id?}',   'Admin\OrderController@show')->name('OrderShow');
    Route::post('/order/success',    'Admin\OrderController@successOrder')->name('OrderSuccess');
    Route::get('/order/success',     'Admin\OrderController@successOrder')->name('OrderSuccess');
    Route::get('/order/err',         'Admin\OrderController@errOrder')->name('OrderErr');

    Route::get('/settings',          'Admin\SiteController@settings')->name('settingsSite');
    Route::post('/settings',         'Admin\SiteController@settings')->name('settingsSite');
    Route::get('/settings',          'Admin\SiteController@settings')->name('settingsSite');
    Route::post('/user/add',         'Admin\SiteController@addUser')->name('addUser');
    Route::get('/user',              'Admin\SiteController@user')->name('user');

    Route::post('/parse',            'Admin\BackService\excel\ExcelController@parse')->name('readExcel');
    Route::get('/write',             'Admin\BackService\excel\ExcelController@write')->name('excelWrite');





    Route::post('/product/{id}', 'Admin/AuthController@show')->name('adminProductOne');
    Route::post('/edit',         'Admin/AuthController@store')->name('adminProductEdit');
    Route::post('/delate',       'Admin/AuthController@destroy')->name('adminProductDelate');
   /* Route::post('/ex', 'Admin\AuthController@ex')->name('ex');*/


});

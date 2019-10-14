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

// Route::get('/', function () {
//     return view('pages.home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
  Route::resource('config'  ,'ConfigController');
  Route::resource('banner'  ,'BannerController');
  Route::resource('category','CategoryController');
  Route::resource('product','ProductController');
// Route::get('/config'     ,'ConfigController@index');
// Route::get('/banner'   , 'BannerController@index');
Route::get('/coupon'   , 'CouponController@index');
// Route::get('/product'  , 'ProductController@index');
// Route::get('/category' , 'CategoryController@index');

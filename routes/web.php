<?php


// Route::get('/', function () {
//     return view('pages.home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
});


  Route::resource('users','UserController');
  Route::resource('config'       , 'ConfigController');
  Route::resource('banner'       , 'BannerController');
  Route::resource('category'     , 'CategoryController');
  Route::resource('product'      , 'ProductController');
  Route::resource('product_attri', 'ProductAttributeController');
  Route::resource('coupon'       , 'CouponController');
  Route::resource('product_attri', 'ProductAttributeController');
  Route::get('/attribute'        , 'ProductController@function_delete');
  
  Route::get('/shopping','FrontendController@index')->name('shopping.home');
  Route::get('/shopping/product','FrontendController@product')->name('shopping.product');
  Route::get('/shopping/login','FrontendController@login')->name('shopping.login');
Route::post('/shopping/register','FrontendController@userstore')->name('shopping.user_register');
Route::post('/shopping/','FrontendController@userverify')->name('shopping.userverify');
Route::group(['middleware' => ['frontlogin']], function() {
    // Route::resource('roles','RoleController');
});
  // Route::post('/shopping/product','FrontendController@index');



// Route::get('/config'     ,'ConfigController@index');
// Route::get('/banner'   , 'BannerController@index');
// Route::get('/product'  , 'ProductController@index');
// Route::get('/category' , 'CategoryController@index');

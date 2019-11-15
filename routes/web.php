<?php


// Route::get('/', function () {
//     return view('pages.home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
});

  Route::resource('users'        , 'UserController');
  Route::resource('config'       , 'ConfigController');
  Route::resource('banner'       , 'BannerController');
  Route::resource('category'     , 'CategoryController');
  Route::resource('product'      , 'ProductController');
  Route::resource('product_attri', 'ProductAttributeController');
  Route::resource('coupon'       , 'CouponController');
  Route::resource('product_attri', 'ProductAttributeController');
  Route::get     ('/attribute'   , 'ProductController@function_delete');
  
Route::get ('/shopping'          ,'FrontendController@index')->name('shopping.home');
Route::get ('/shopping/product'  ,'FrontendController@product')->name('shopping.product');
Route::get ('/shopping/login'    ,'FrontendController@login')->name('shopping.login');
Route::post('/shopping/register' ,'FrontendController@userstore')->name('shopping.user_register');
Route::post('/shopping/'         ,'FrontendController@userverify')->name('shopping.userverify');
Route::get ('/shopping/logout'   ,'FrontendController@userlogout')->name('shopping.userlogout');

Route::group(['middleware' => ['frontlogin']], function() {

    Route::match (['get','post'],'/shopping/chart','FrontendController@chart')
                ->name('shopping.chart');   
    Route::get ('/shopping/account'    ,'FrontendController@account')->name('shopping.account');
    Route::get ('/shopping/account/address/{id}' ,'FrontendController@useraddress')->name('shopping.address');
    Route::post ('/shopping/account/address/{id}' ,'FrontendController@storeuseradd')->name('shopping.addressstore');
    Route::get('/shopping/account/editaddress/{id}' ,'FrontendController@edituseradd')->name('shopping.addressedit');
    Route::post('/shopping/account/updateaddress/{id}' ,'FrontendController@updateaddress')->name('shopping.updateaddress');
    Route::get('/makedeafult/' ,'FrontendController@update_def_address');
});


// Route::post('/shopping/product','FrontendController@index');
// Route::get('/config'     ,'ConfigController@index');
// Route::get('/banner'   , 'BannerController@index');
// Route::get('/product'  , 'ProductController@index');
// Route::get('/category' , 'CategoryController@index');

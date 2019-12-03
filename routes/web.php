<?php


// Route::get('/', function () {
//     return view('pages.home');
// });


      
       
         Auth::routes();
      
    Route::post('/login/custom',     'Auth\LoginController@login_custom')->name('login.custom');
    Route::get ('/shopping','FrontendController@index')->name('shopping.home');
    Route::post('/shopping/register' ,'FrontendController@userstore')->name('shopping.user_register');
    Route::post('/shopping/'         ,'FrontendController@userverify')->name('shopping.userverify');
    Route::get ('/shopping/logout'   ,'FrontendController@userlogout')->name('shopping.userlogout');
    Route::get('/shopping/account/forgot','FrontendController@forgot')->name('shopping.forgot');
    Route::get ('/shopping/login'    ,'FrontendController@login')->name('shopping.login');


      Route::group(['middleware' => ['auth']], function() {
      Route::get('/', 'HomeController@index')->name('home');
      Route::resource('roles','RoleController');
      Route::resource('users'        , 'UserController');
      Route::resource('config'       , 'ConfigController');
      Route::resource('banner'       , 'BannerController');
      Route::resource('category'     , 'CategoryController');
      Route::resource('product'      , 'ProductController');
      Route::resource('product_attri', 'ProductAttributeController');
      Route::resource('coupon'       , 'CouponController');
      Route::resource('order'       , 'OrderController');
      Route::get     ('/attribute'   , 'ProductController@function_delete');

      
    // Route::resource('product_attri', 'ProductAttributeController');
    // Route::get ('/shopping/product'  ,'FrontendController@product')->name('shopping.product');
    // Route::get('login/{provider}', 'FrontendController@redirectToProvider');
    // Route::get('login/{provider}/callback','FrontendController@handleProviderCallback');
  
  


    Route::group(['middleware' => ['frontlogin']], function() {


    Route::match (['get','post'],'/shopping/cart','FrontendController@cart')
                ->name('shopping.cart');   

    Route::get ('/shopping/account'    ,'FrontendController@account')->name('shopping.account');
    Route::post ('/shopping/account/'    ,'FrontendController@userdetails')->name('shopping.userdetails');
    Route::get ('/shopping/account/address/{id}' ,'FrontendController@useraddress')->name('shopping.address');
    Route::post ('/shopping/account/address/{id}' ,'FrontendController@storeuseradd')->name('shopping.addressstore');
    Route::get('/shopping/account/editaddress/{id}' ,'FrontendController@edituseradd')->name('shopping.addressedit');
    Route::post('/shopping/account/updateaddress/{id}' ,'FrontendController@updateaddress')->name('shopping.updateaddress');
    Route::get('/makedeafult/' ,'FrontendController@update_def_address');
    Route::delete('/deleteadd/{id}' ,'FrontendController@deleteadd')->name('shopping.deleteadd');
    Route::get('/shopping/{id}/addtocart' ,'FrontendController@addtocart')->name('shopping.addtocart');
    Route::delete('/shopping/{id}/delete' ,'FrontendController@removefromcart')->name('shopping.removefromcart');
    Route::get('/shopping/{id}/product_details' ,'FrontendController@product')->name('shopping.product_details');
    Route::get('/shopping/checkout/' ,'FrontendController@checkout_product')->name('shopping.checkout');
     // payWithpaypal
     Route::get('/shopping/paypal/' ,'FrontendController@paypal')->name('shopping.paypal');
     Route::get('/shopping/cod/' ,'FrontendController@cod')->name('shopping.cod');
     Route::post('/shopping/payment/' ,'PaypalController@payWithpaypal')->name('shopping.payWithpaypal');
     Route::get('/shopping/status/' ,'PaypalController@getPaymentStatus')->name('shopping.status');
     Route::get('/shopping/{id}/order' , 'FrontendController@userorders')
       ->name('shopping.userorder');

     Route::get('/shopping/wishlist/' , 'FrontendController@wishlisist')
       ->name('shopping.wishlist');
     Route::get('/shopping/wishlist/{id}' , 'FrontendController@addwishlist')
       ->name('shopping.addwishlist');
     Route::delete('/deletewish/{id}' ,'FrontendController@removewishlist')
       ->name('shopping.removewishlist');

     Route::get('/shopping/contactus/' , 'FrontendController@contactus')
       ->name('shopping.contactus');

     Route::post('/shopping/cartcoupon' , 'FrontendController@coupon')
       ->name('shopping.coupon');
    Route::get('/shopping/removecoupon' , 'FrontendController@removecoupon')
       ->name('shopping.removecoupon');

   
    });
 });  

// Route::post('/shopping/product','FrontendController@index');
// Route::get('/config'     ,'ConfigController@index');
// Route::get('/banner'   , 'BannerController@index');
// Route::get('/product'  , 'ProductController@index');
// Route::get('/category' , 'CategoryController@index');

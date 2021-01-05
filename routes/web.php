<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProductController@getIndex')->name('shop.index');
Route::post('/contact', 'ContactController@send')->name('contact.send');

Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.remove');


Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
Route::post('/checkout', 'ProductController@postCheckout')->name('checkout');

Route::group(['prefix'=>'user','middleware'=>['guest']], function() {
    Route::get('/signup', 'UserController@getSignup')->name('user.signup');
    Route::post('/signup', 'UserController@postSignup')->name('user.signup');
    Route::get('/signin', 'UserController@getSignin')->name('user.signin');
    Route::post('/signin', 'UserController@postSignin')->name('user.signin');
});

Route::group(['prefix' => 'user', 'middleware'=>['auth']], function() {
    Route::get('/profile', 'UserController@getProfile')->name('user.profile');
    Route::get('/logout', 'UserController@getLogout')->name('user.logout');
});


Route::group(['prefix' => 'admin','middleware'=>['is_admin']], function() {
    Route::group(['middleware'=>['auth']], function() {
        Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        Route::resource('user', 'Admin\UserController');
        Route::resource('admin', 'Admin\AdminController');
        Route::resource('category', 'Admin\CategoryController');
        Route::resource('product', 'Admin\ProductController');
        Route::resource('order', 'Admin\OrderController');
        Route::resource('contact', 'Admin\ContactController');
        Route::get('user/orders/{id}', 'Admin\UserController@getUserOrders')->name('user.orders');
    });
});



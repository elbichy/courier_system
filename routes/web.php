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
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'LandingController@index')->name('landing');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register_submit');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/login', 'LandingController@index')->name('login');
Route::get('/pricelist', 'LandingController@pricelist')->name('priceList');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::group(['prefix' => 'administrator'], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('/approved', 'UsersController@approvedUsers')->name('approvedUsers');
            Route::get('/pending', 'UsersController@pendingUsers')->name('pendingUsers');
            Route::get('/declined', 'UsersController@declinedUsers')->name('declinedUsers');
            Route::get('/{user}/approve', 'UsersController@approveUser')->name('approveUser');
            Route::get('/{user}/decline', 'UsersController@declineUser')->name('declineUser');
            Route::get('/{user}/edit', 'UsersController@editUser')->name('editUser');
            Route::put('/{user}/update', 'UsersController@updateUser')->name('updateUser');
            Route::delete('/{user}/delete', 'UsersController@deleteUser')->name('deleteUser');
        });
        Route::group(['prefix' => 'delivery'], function () {
            Route::get('/requests', 'DeliveryController@deliveryRequest')->name('deliveryRequest');
            Route::get('/pending', 'DeliveryController@deliveryPending')->name('deliveryPending');
            Route::get('/completed', 'DeliveryController@deliveryCompleted')->name('deliveryCompleted');
            Route::get('/cancelled', 'DeliveryController@deliveryCancelled')->name('deliveryCancelled');
            Route::get('/{delivery}/approve', 'DeliveryController@approveDelivery')->name('approveDelivery');
            Route::get('/{delivery}/cancel', 'DeliveryController@cancelDelivery')->name('cancelDelivery');
            Route::get('/{delivery}/complete', 'DeliveryController@completeDelivery')->name('completeDelivery');
        });
    });

    Route::group(['prefix' => 'user'], function () {
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/edit', 'UsersController@editProfile')->name('editProfile');
            Route::put('/update', 'UsersController@updateProfile')->name('updateProfile');
        });
        Route::group(['prefix' => 'delivery'], function () {
            Route::get('/new', 'DeliveryController@deliveryNew')->name('deliveryNew');
            Route::post('/new', 'DeliveryController@deliveryStore')->name('deliveryStore');
            Route::get('/requests', 'DeliveryController@deliveryRequest')->name('deliveryRequest');
            Route::get('/inprogress', 'DeliveryController@deliveryPending')->name('deliveryInprogress');
            Route::get('/completed', 'DeliveryController@deliveryCompleted')->name('deliveryCompleted');
            Route::get('/cancelled', 'DeliveryController@deliveryCancelled')->name('deliveryCancelled');
            Route::get('/{delivery}/reciept', 'DeliveryController@requestReciept')->name('requestReciept');
        });
    });
});
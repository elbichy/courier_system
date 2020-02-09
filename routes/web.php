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
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::group(['prefix' => 'administrator'], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('/new', 'UsersController@newUser')->name('newUser');
            Route::get('/approved', 'UsersController@approvedUsers')->name('approvedUsers');
            Route::get('/pending', 'UsersController@declinedUsers')->name('declinedUsers');
            Route::get('/declined', 'UsersController@approveUser')->name('newUser');
            Route::get('/{user}/approve', 'UsersController@approveUser')->name('approveUser');
            Route::get('/{user}/decline', 'UsersController@declineUser')->name('declineUser');
        });
    });
});
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('loginView');
});
        
Route::post('/doLogin', 'LoginController@index');

Route::post('/whoami','WhatsMyNameController@index');

Route::get('/askme', function () {
    return view('whoami');
});

Route::get('/login2', function () {
    return view('login2');
});

Route::get('/customer', function () {
    return view('customer');
});

Route::post('/addCustomer', 'CustomerController@index');

Route::get('/neworder', function () {
    return view('order');
});

Route::post('/addorder', 'OrderController@index');

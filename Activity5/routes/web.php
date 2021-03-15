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
    return view('index');
});

Route::get('/login', function () {
    return view('login2');
});

Route::get('/logout', 'LoginController@logout');
        
Route::post('/doLogin', 'LoginController@index');

Route::post('/whoami','WhatsMyNameController@index');

Route::get('/askme', function () {
    return view('whoami');
});

Route::get('/customer', function () {
    return view('customer');
});

Route::post('/addCustomer', 'CustomerController@index');

Route::get('/neworder', function () {
    return view('order');
});

Route::post('/addorder', 'OrderController@index');

//RESTful - Activity 5

Route::get('/usersrest', 'UsersRestController@index');
Route::get('/usersrest/{id}', 'UsersRestController@show');

Route::get('/restclient', 'RestClientController@index');

Route::get('/loggingservice', 'TestLoggingController@index');

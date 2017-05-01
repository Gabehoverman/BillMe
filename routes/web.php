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

Route::get('/tenants', 'Controller@Tenants');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin/dashboard', 'AdminController@dashboard')->middleware('auth');

Route::get('tenant', 'Controller@tenants')->middleware('auth');

Route::get('admin/add-bill', 'AdminController@addBill')->middleware('auth');

Route::post('admin/add-bill', 'AdminController@updateBill')->middleware('auth');

Route::get('admin/add-payment', 'AdminController@addPayment')->middleware('auth');

Route::post('admin/add-payment', 'AdminController@updatePayment')->middleware('auth');

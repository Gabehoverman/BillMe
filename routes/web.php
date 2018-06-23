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

use App\Models\Maintenance;
use App\Models\Home;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\CommentType;

Route::get('/', function () {
    return view('Landing');
});

Route::get('/tenants', 'Controller@Tenants');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin/dashboard', 'AdminController@dashboard')->middleware('auth');

Route::get('/tenant', 'Controller@Tenants')->middleware('auth');

Route::get('admin/bills', 'AdminController@bills')->middleware('auth');

Route::get('admin/add-bill', 'AdminController@addBill')->middleware('auth');

Route::post('admin/add-bill', 'AdminController@updateBill')->middleware('auth');

Route::get('admin/payments', 'AdminController@payments')->middleware('auth');

Route::get('admin/add-payment', 'AdminController@addPayment')->middleware('auth');

Route::post('admin/add-payment', 'AdminController@updatePayment')->middleware('auth');

Route::get('admin/tenants', 'AdminController@tenants')->middleware('auth');

Route::get('admin/tenant-form', 'AdminController@tenantForm')->middleware('auth');

Route::post('admin/add_tenant', 'AdminController@addTenant')->middleware('auth');

Route::get('admin/settings', 'AdminController@settings')->middleware('auth');

Route::post('admin/settings', 'AdminController@updateSettings')->middleware('auth');

Route::get('admin/logout', 'AdminController@logout');

Route::get('/hello', function() {
    return view('layouts/admin');
});

Route::get('test', function() {
    return view('admin/home');
});

Route::get('/form', function() {
    return view('admin/bill-form-test');
});

Route::get('dash-test', function() { return view('admin/dash-test');});


/**** RESTFUL API ROUTES ****/

//Utility URLs
Route::get('/utility', 'restfulapi@getAllUtilities');

Route::get('utility/{id}','restfulapi@getOneUtility');

Route::get('utility/home/{id}','restfulapi@getHomeUtilities');



//Bill URLs
Route::get('/bills', 'restfulapi@getAllBills');

Route::get('bills/{id}', 'restfulapi@getOneBill');

Route::get('bills/utility/{id}', 'restfulapi@getUtilityBill');

//Sandbox URLS

Route::get('sandbox', 'AdminController@TestEnvironment');

Route::get('MaterialDash', function() {
		return(view('MaterialDash'));
	});


/**
 * App URLs 
 * Reworked with new controller, use these moving forward
 */
Route::get('{}', function() {
    return(view('landing'));
});
Route::get('landing', function() {
    return(view('landing'));
});
Route::get('app/user', 'AppController@user')->middleware('auth');
Route::get('app/tasks','AppController@tasks')->middleware('auth');
Route::get('app/bills', 'AppController@bills')->middleware('auth');
Route::get('app/maintenance', 'AppController@maintenance')->middleware('auth');
Route::get('app/posts','AppController@posts')->middleware('auth');
Route::get('app/house','AppController@house')->middleware('auth');
Route::get('app/logout', 'AppController@logout')->middleware('auth');
Route::get('app/dashboard', 'AppController@dashboard')->middleware('auth');
Route::get('app/test', 'AppController@test')->middleware('auth');
Route::get('newhome', function() {
    return view('auth/signup');
});

//Route::post('/register/new', 'Auth\RegisterController@new');
Route::post('/register/new', 'AppController@newHouse');
Route::post('/app/bills', 'AppController@bills')->middleware('auth');
Route::post('app/maintenance','AppController@maintenance')->middleware('auth');
Route::post('app/maintenance/delete','AppController@deleteMaintenance');
Route::post('app/bills/delete', 'AppController@deleteBill')->middleware('auth');
Route::post('app/data/delete','AppController@delete')->middleware('auth');
Route::post('app/home/check', 'AppController@checkHomeCode');

Route::post('/post/test', function () {
    $data = "success";
    return json_encode($data);
});

Route::get('Vue', function() {
    $data['maintenance'] = Maintenance::all();
    return(view('Vue',$data));
});

Route::get('Maintenance', function() {
    $data['maintenance'] = Maintenance::all();
    return($data);
});

//Single page app routes
Route::get('app/spa', function() {
    return view('app/spa');
})->middleware('auth');

Route::get('app/spa/{id}', function() {
    return redirect('app/spa');
});

//Testing API Routes 
Route::get('/api/v1/house/all', 'API\V1\HomeController@getAll');
Route::resource('/api/v1/house','API\V1\HomeController');

Route::get('/api/v1/maintenance/data','API\V1\MaintenanceController@allData');
Route::get('/api/v1/maintenance/comments/{id}','API\V1\MaintenanceController@maintenanceComments');
Route::resource('/api/v1/maintenance','API\V1\MaintenanceController');

Route::get('/api/v1/alerts/data','API\V1\AlertController@allData');
Route::resource('/api/v1/alerts','API\V1\AlertController');

Route::get('/api/v1/payments/data','API\V1\PaymentController@allData');
Route::get('/api/v1/payments/comments/{id}','API\V1\PaymentController@paymentComments');
Route::resource('/api/v1/payments','API\V1\PaymentController');

Route::get('/api/v1/bills/data','API\V1\BillController@allData');
Route::get('api/v1/bills/comments/{id}','API\V1\BillController@billComments');
Route::resource('/api/v1/bills','API\V1\BillController');

Route::get('/api/v1/posts/data','API\V1\PostController@allData');
Route::get('api/v1/posts/comments/{id}','API\V1\PostController@postComments');
Route::resource('/api/v1/posts','API\V1\PostController');

Route::get('/api/v1/tasks/data','API\V1\TaskController@allData');
Route::get('api/v1/tasks/comments/{id}','API\V1\TaskController@taskComments');
Route::resource('/api/v1/tasks','API\V1\TaskController');

Route::get('/api/v1/comments/data','API\V1\CommentController@allData');
Route::get('api/v1/comments/{type}/{id}','API\V1\CommentController@commenyByType');
Route::resource('/api/v1/comments','API\V1\CommentController');

Route::get('api/v1/user', function() {
    $data['user'] = Auth::user();
    $data['tenant'] = Auth::user()->tenant;
    $data['house'] = Auth::user()->tenant->home;
    $data['alerts'] = Auth::user()->alerts;
    return $data;
});

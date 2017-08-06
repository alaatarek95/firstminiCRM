<?php
use App\Call;
use App\Visit;
use App\Followup;
use App\Admin;
use App\Customer;
use App\User;
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

Auth::routes();
//routes for admin
Route::get('/admin','AdminController@index');
Route::get('/admin/login','Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@Login')->name('admin.login.submit');

//routes for customer
Route::get('/customerHome','CutomerController@index');
Route::get('/customer/login','Auth\CustomerLoginController@ShowLoginForm')->name('customer.login');
Route::post('/customer/login','Auth\CustomerLoginController@Login')->name('customer.login.submit');
Route::get('/customer/form','CutomerController@showForm');
Route::get('/customer/create','Auth/CustomerRegisterController@create')->name('customer.create');


//routes for call
Route::get('/call','CallController@index');
Route::get('/call/addCall','CallController@viewAddCall');
Route::get('/call/updateCall/{id}','CallController@viewUpdateCall');
Route::post('/call/addcalls','CallController@AddCall');
Route::post('call/updateCalls{id}','CallController@updateCall');
Route::get('call/delete/{id}', 'CallController@deleteCall');
//routes for followup
Route::get('/followup/index','FollowupController@index');
Route::get('/followup/addFollowup','FollowupController@viewAddFollowup');
Route::get('/followup/updateFollowup/{id}','FollowupController@viewUpdateFollowup');
Route::post('/followup/addfollowups','FollowupController@AddFollowup');
Route::post('/followup/updateFollowups/{id}','FollowupController@updateFollowup');
Route::get('followup/delete/{id}', 'FollowupController@deleteFollowup');

//routes for visit
Route::get('/visit','VisitController@index');
Route::get('/visit/addVisit','VisitController@viewAddVisit');
Route::get('/visit/updateVisit/{id}','VisitController@viewUpdateVisit');
Route::post('/visit/addvisits','VisitController@AddVisit');
Route::post('/visit/updatevisits{id}','VisitController@updateVisit');
Route::get('visit/delete/{id}', 'VisitController@deletevisit');

Route::get('/home', 'HomeController@index')->name('home');


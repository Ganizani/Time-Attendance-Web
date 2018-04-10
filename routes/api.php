<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Users
Route::get('/users/all', 'UserController@get_all');
Route::put('/users/{id}', 'UserController@update');
Route::post('/users', 'UserController@create');
Route::post('/users/login', 'UserController@login');
Route::get('/users/verify/{token}', 'UserController@verify_data');
Route::post('/users/password/forgot', 'UserController@forgot_password_data');
Route::post('/users/password/reset', 'UserController@reset_password_data');
Route::put('/my_account', 'UserController@reset_password_data');


//Department
Route::get('/departments', 'DepartmentController@get_all');
Route::put('/departments/{id}', 'DepartmentController@update');
Route::post('/departments', 'DepartmentController@create');

//Devices
Route::get('/devices', 'DeviceController@get_all');
Route::put('/devices/{id}', 'DeviceController@update');
Route::post('/devices', 'DeviceController@create');

//Leave Type
Route::post('/leaves', 'LeaveController@create');
Route::put('/leaves/{id}', 'LeaveController@update');

//Leave Type
Route::get('/leave_types', 'LeaveController@get_all_leave_type');
Route::post('/leave_types', 'LeaveController@create_type');
Route::put('/leave_types/{id}', 'LeaveController@update_type');


//Records
Route::get('/records/recently', 'HomeController@recent_records');
Route::get('/dashboard_info', 'HomeController@dashboard_info');

//Reports
Route::get('/reports/absentee', 'ReportController@absentee_data');
Route::get('/reports/attendance', 'ReportController@attendance_data');
Route::get('/reports/base', 'ReportController@base_data');
Route::get('/reports/leave', 'ReportController@leave_data');
Route::get('/reports/map', 'ReportController@map_data');
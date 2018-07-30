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
Route::get('/users', 'UserController@get_all');
Route::get('/users/{id}', 'UserController@get_one');
Route::put('/users/{id}', 'UserController@update');
Route::post('/users', 'UserController@create');
Route::delete('/users/{id}', 'UserController@delete');
Route::post('/users/login', 'UserController@login');
Route::get('/users/verify/{token}', 'UserController@verify_data');
Route::post('/users/password/forgot', 'UserController@forgot_password_data');
Route::post('/users/password/reset', 'UserController@reset_password_data');
Route::put('/my_account', 'UserController@update_my_account');
Route::post('/users/clock', 'UserController@clock');
Route::post('/password/update/{id}', 'UserController@update_password');

//Department
Route::get('/departments', 'DepartmentController@get_all');
Route::get('/departments/{id}', 'DepartmentController@get_one');
Route::put('/departments/{id}', 'DepartmentController@update');
Route::post('/departments', 'DepartmentController@create');
Route::delete('/departments/{id}', 'DepartmentController@delete');

//Devices
Route::get('/devices', 'DeviceController@get_all');
Route::get('/devices/{id}', 'DeviceController@get_one');
Route::put('/devices/{id}', 'DeviceController@update');
Route::post('/devices', 'DeviceController@create');
Route::delete('/devices/{id}', 'DeviceController@delete');

//Holidays
Route::get('/holidays', 'HolidayController@get_all');
Route::get('/holidays/{id}', 'HolidayController@get_one');
Route::put('/holidays/{id}', 'HolidayController@update');
Route::post('/holidays', 'HolidayController@create');
Route::delete('/holidays/{id}', 'HolidayController@delete');

//Leaves
Route::post('/leaves', 'LeaveController@create');
Route::get('/leaves/{id}', 'LeaveController@get_one_leave');
Route::post('/leaves/update/{id}', 'LeaveController@update');
Route::delete('/leaves/{id}', 'LeaveController@delete_leave');

//Leave Type
Route::get('/leave_types', 'LeaveController@get_all_leave_type');
Route::post('/leave_types', 'LeaveController@create_type');
Route::put('/leave_types/{id}', 'LeaveController@update_type');
Route::get('/leave_types/{id}', 'LeaveController@get_one_leave_type');
Route::delete('/leave_types/{id}', 'LeaveController@delete_type');


//Records
Route::get('/records/recently', 'HomeController@recent_records');
Route::get('/dashboard_info', 'HomeController@dashboard_info');

//Reports
Route::get('/reports/absentee', 'ReportController@absentee_data');
Route::get('/reports/attendance', 'ReportController@attendance_data');
Route::get('/reports/base', 'ReportController@base_data');
Route::get('/reports/leave', 'ReportController@leave_data');
Route::get('/reports/map', 'ReportController@map_data');

//Access Control
Route::get('/user-groups', 'UserGroupController@get_all');
Route::get('/user-groups/{id}', 'UserGroupController@get_one');
Route::post('/user-groups', 'UserGroupController@create');
Route::put('/user-groups/{id}', 'UserGroupController@update');
Route::delete('/user-groups/{id}', 'UserGroupController@delete');
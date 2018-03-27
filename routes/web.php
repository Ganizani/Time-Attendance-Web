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

//Home Controller
Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');

//Login
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');

//Password
Route::get('/password/forgot', 'HomeController@forgot_password');
Route::get('/password/reset', 'HomeController@reset_password');

//Reports
Route::get('/reports/absent', 'ReportController@absent');
Route::get('/reports/attendance', 'ReportController@attendance');
Route::get('/reports/base', 'ReportController@base');
Route::get('/reports/leave', 'ReportController@leave');
Route::get('/reports/map', 'ReportController@map');
Route::get('/reports/stipend', 'ReportController@stipend');
Route::get('/reports/registration', 'ReportController@registration');

//Company
Route::get('/departments', 'DepartmentController@index');
Route::get('/departments/add', 'DepartmentController@add');
Route::get('/departments/upload', 'DepartmentController@upload');
Route::get('/departments/edit/{id?}', 'DepartmentController@edit');

//Leave
Route::get('/leaves', 'LeaveController@add_leave');
Route::get('/leaves/add', 'LeaveController@add_leave');
Route::get('/leaves/edit/{id?}', 'LeaveController@edit_leave');
Route::get('/leaves/upload', 'LeaveController@upload_leave');
Route::get('/leaves/types', 'LeaveController@list_type');
Route::get('/leaves/types/add', 'LeaveController@add_type');
Route::get('/leaves/types/edit/{id}', 'LeaveController@edit_type');

//Holiday
Route::get('/holidays', 'HolidayController@index');
Route::get('/holidays/add', 'HolidayController@add');
Route::get('/holidays/upload', 'HolidayController@upload');
Route::get('/holidays/edit/{id?}', 'HolidayController@edit');

//Device
Route::get('/devices', 'DeviceController@index');
Route::get('/devices/add', 'DeviceController@add');
Route::get('/devices/upload', 'DeviceController@upload');
Route::get('/devices/edit/{id?}', 'DeviceController@edit');

//User
Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/list', 'EmployeeController@index');
Route::get('/employees/add', 'EmployeeController@add');
Route::get('/employees/upload', 'EmployeeController@upload');
Route::get('/employees/edit/{id?}', 'EmployeeController@edit');

//MyAccount
Route::get('/my-account/{id?}', 'EmployeeController@myAccount');
<?php

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


//Holiday
Route::get('/holidays', 'HolidayController@index');
Route::get('/holidays/add', 'HolidayController@add');
Route::get('/holidays/upload', 'HolidayController@upload');
Route::get('/holidays/edit/{id?}', 'HolidayController@edit');


//User
Route::get('/users', 'UserController@index');
Route::get('/users/list', 'UserController@index');
Route::get('/users/add', 'UserController@add');
Route::get('/users/upload', 'UserController@upload');
Route::get('/users/edit/{id?}', 'UserController@edit');

//MyAccount
Route::get('/my-account', 'UserController@myAccount');

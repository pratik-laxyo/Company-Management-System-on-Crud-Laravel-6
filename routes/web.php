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
Route::get('/company', function () {
    return view('panel.company.index');
});
Route::get('/employee', function () {
    return view('panel.employee.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('company', 'CompanyController');
Route::resource('employee', 'EmployeeController');
Route::resource('test', 'TestController');
//Route::get('employee', 'EmployeeController@anyData')->name('employee.anyData');
Route::get('export/', 'EmployeeController@export')->name('export');
Route::post('import', 'EmployeeController@import')->name('import');
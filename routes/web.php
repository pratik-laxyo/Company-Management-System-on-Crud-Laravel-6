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

Route::group(['middleware' => ['auth']], function() {
		Route::resource('company', 'CompanyController');
		Route::resource('employee', 'EmployeeController');
		Route::resource('role', 'RoleController');
		Route::resource('test', 'TestController');
		Route::get('export/', 'EmployeeController@export')->name('export');
		Route::post('import', 'EmployeeController@import')->name('import');
		Route::get('/employee/{id}/role', 'EmployeeController@role')->name('role');
		Route::get('/employee/{id}/show', 'EmployeeController@show')->name('show');
		Route::patch('/employee/{id}/roleUpdate', 'EmployeeController@roleUpdate')->name('roleUpdate');
});
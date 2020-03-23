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

//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('employess/Delete/{id}', 'EmployessController@destroy')->name('employessDelete');
Route::post('employess/Update/{id}', 'EmployessController@update')->name('employessUpdate');

Route::get('company/Delete/{id}', 'CompaniesController@destroy')->name('companyDelete');
Route::post('company/Update/{id}', 'CompaniesController@update')->name('companyUpdate');

Route::resource('companies', 'CompaniesController');
Route::resource('employess', 'EmployessController');
       
Route::post('passGenerator','GeneralController@passGenerator')->name('passGenerator');

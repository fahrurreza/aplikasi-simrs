<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/registration', 'StudentController@registration');
Route::post('/registration', 'StudentController@register');

Route::resource('/study', 'StudyController');

Route::resource('/price', 'PriceController');

Route::resource('/group', 'GroupController');

Route::resource('/transaction', 'TransactionController');

Route::resource('/student', 'StudentController');

Route::resource('/user', 'UserController');

// Auth::routes();

Auth::routes();

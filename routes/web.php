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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home Page
Route::get('/', 'PagesController@home');

// Product / Catalogue page
Route::get('/catalogue', 'CatalogueController@index');

// Cart Page
Route::get('/cart', 'PagesController@cart');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/admin/dashboard', 'DashboardController@adminHome')->name('admin.dashboard')->middleware('is_admin');
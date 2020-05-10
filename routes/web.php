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

// Cart Page
Route::get('/cart', 'PagesController@cart');

// Product / Catalogue page
Route::get('/catalogue', 'CatalogueController@index');

Auth::routes();

// User Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Admin Routes
Route::get('/admin/dashboard', 'AdminPagesController@index')->name('admin.dashboard')->middleware('is_admin');
Route::get('/admin/transactions', 'AdminPagesController@transactions')->name('admin.transactions')->middleware('is_admin');
Route::get('/admin/sales', 'AdminPagesController@sales')->name('admin.sales')->middleware('is_admin');
Route::get('/admin/reports', 'AdminPagesController@reports')->name('admin.reports')->middleware('is_admin');
Route::get('/admin/users', 'AdminPagesController@users')->name('admin.users')->middleware('is_admin');
Route::get('/admin/products', 'AdminPagesController@products')->name('admin.products')->middleware('is_admin');
Route::get('/admin/profile', 'AdminPagesController@profile')->name('admin.profile')->middleware('is_admin');
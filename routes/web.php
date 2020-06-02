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
Route::get('/catalogue/{category}', 'CatalogueController@subindex')->name('catalogue.category');

Auth::routes();

// User Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Admin Routes
Route::get('/admin/dashboard', 'Admin\AdminPagesController@index')->name('admin.dashboard')->middleware('is_admin');
Route::get('/admin/transactions', 'Admin\AdminPagesController@transactions')->name('admin.transactions')->middleware('is_admin');
Route::get('/admin/sales', 'Admin\AdminPagesController@sales')->name('admin.sales')->middleware('is_admin');
Route::get('/admin/reports', 'Admin\AdminPagesController@reports')->name('admin.reports')->middleware('is_admin');  
Route::get('/admin/profile', 'Admin\AdminPagesController@profile')->name('admin.profile')->middleware('is_admin');

// Products Routes
Route::resource('/admin/products', 'Admin\ProductController')->middleware('is_admin');
Route::get('/admin/products/category/{category}', 'Admin\ProductController@subindex')->name('admin.product.category')->middleware('is_admin');

// User Routes
Route::resource('/admin/users', 'Admin\UserController')->middleware('is_admin');
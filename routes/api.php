<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'API\RegisterController@register');

Route::middleware('auth:api')->group( function () {
    Route::get('products', 'API\ProductServiceController@getProducts')->name('productService.products.index');
});

Route::post('register', 'API\RegisterController@register');

// User Services
Route::get('users', 'API\UserServiceController@getUsers')->name('userService.user.index');
Route::get('users/{id}', 'API\UserServiceController@getUser')->name('userService.user.show');
Route::post('users', 'API\UserServiceController@createUser')->name('userService.user.store');
Route::match(['put', 'patch'],'users/{id}', 'API\UserServiceController@updateUser')->name('userService.user.update');
Route::delete('users/{id}', 'API\UserServiceController@destroyUser')->name('userService.user.delete');


// Product Services
Route::get('categories', 'API\ProductServiceController@getCategories')->name('productService.categories.index');
Route::get('categories/first', 'API\ProductServiceController@getFirstCategory')->name('productService.categories.first');
Route::get('categories/{category}', 'API\ProductServiceController@showCategory')->name('productService.categories.show');
Route::get('categories/{category}/thumbnail', 'API\ProductServiceController@showCategoryThumbnail')->name('productService.categories.thumbnail');
Route::get('categories/{category}/products', 'API\ProductServiceController@showCategoryProducts')->name('productService.categories.products');

Route::get('products/{product}', 'API\ProductServiceController@showProduct')->name('productService.products.show');
Route::get('products/{product}/thumbnail', 'API\ProductServiceController@showProductThumbnail')->name('productService.products.thumbnail');
Route::post('products', 'API\ProductServiceController@storeProduct')->name('productService.products.store');
Route::match(['put', 'patch'], 'products/{product}', 'API\ProductServiceController@updateProduct')->name('productService.products.update');
Route::delete('products/{product}', 'API\ProductServiceController@destroyProduct')->name('productService.products.destroy');
Route::delete('products/{product}/photos', 'API\ProductServiceController@destroyProductPhotos')->name('productService.products.photos.destroy');

Route::get('materials', 'API\ProductServiceController@getMaterials')->name('productService.materials.index');
Route::get('colours', 'API\ProductServiceController@getColours')->name('productService.colours.index');
Route::get('sizes', 'API\ProductServiceController@getSizes')->name('productService.sizes.index');

Route::post('photos', 'API\ProductServiceController@storePhoto')->name('productService.photos.store');
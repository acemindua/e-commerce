<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:super-user|admin']
    ], function () {
    
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    
    /** Catalog */

    // Brands
    Route::resource('/catalog/brands', App\Http\Controllers\Admin\BrandController::class);
    // Categories
    Route::resource('/catalog/categories', App\Http\Controllers\Admin\CategoryController::class);
    // Tags
    Route::resource('/catalog/tags', App\Http\Controllers\Admin\TagController::class);
    // Products
    Route::resource('/catalog/products', App\Http\Controllers\Admin\ProductController::class);

    /** Users */
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
});


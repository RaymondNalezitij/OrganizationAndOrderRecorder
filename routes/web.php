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

Route::get('/', [\App\Http\Controllers\MainPageController::class, 'create'])
    ->name('mainPage');

Route::get('/organizations', [\App\Http\Controllers\OrganizationController::class, 'create'])
    ->name('organizations');
Route::post('/organizations', [\App\Http\Controllers\OrganizationController::class, 'store'])
    ->name('organization.store');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'create'])
    ->name('products');
Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])
    ->name('products.store');

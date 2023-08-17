<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
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

Route::get('/customers/index', [CustomerController::class, 'getCate']);
Route::get('/customers/detail', [CustomerController::class, 'detail']);
Route::get('/customers/shop/{id}', [CustomerController::class, 'shop']);
Route::get('/customers/shop',[CustomerController::class, 'getAll']);
Route::get('/admin/admin', [AdminController::class, 'admin']);
Route::match(['get', 'post'], '/admin/admin/add_pd', [AdminController::class, 'add_pd'])->name('admin.add_pd');
Route::match(['get', 'post'], '/admin/admin/add_cate', [AdminController::class, 'add_cate'])->name('admin.add_cate');
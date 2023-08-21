<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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
Route::get('/customers/detail/{id}', [CustomerController::class, 'detail']);
Route::get('/customers/shop/{id}', [CustomerController::class, 'shop']);
Route::get('/customers/search',[CustomerController::class, 'getAll']);
Route::get('/customers/log', function () {
    return view('customers/login');
});
Route::get('/customers/signup',[CustomerController::class, 'createAccount']);
Route::get('/customers/sign', function () {
    return view('customers.signup');
});
Route::match(['get', 'post'], '/customers/login', [CustomerController::class, 'Access'])->name('customers.login');

Route::match(['get', 'post'], '/customers/signup', [CustomerController::class, 'createAccount'])->name('customers.signup');
Route::get('/customers/logout',[CustomerController::class,'Logout']);
Route::get('/customers/Addcart/{id}',[CustomerController::class,'Addcart']);

Route::get('/customers/Rendercart',[CustomerController::class,'Rendercard']);
Route::get('/customers/Deletecard/{id}',[CustomerController::class,'Deletecard']);

Route::get('/admin/admin', [AdminController::class, 'admin']);
Route::match(['get', 'post'], '/admin/admin/add_pd', [AdminController::class, 'add_pd'])->name('admin.add_pd');
Route::match(['get', 'post'], '/admin/admin/add_cate', [AdminController::class, 'add_cate'])->name('admin.add_cate');
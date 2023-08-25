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
Route::get('/customers/detail/{id}', [CustomerController::class, 'detail']);
Route::match(['get', 'post'], '/customers/shop/{id}', [CustomerController::class, 'shop'])->name('shop');
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

Route::match(['GET', 'POST'], '/customers/compare', [CustomerController::class, 'Get_id_to_compare'])->name('customers.compare');
Route::match(['get', 'post'], '/customers/compare', [CustomerController::class, 'Show_compare_product'])->name('customers.compare');


Route::get('/customers/about', [CustomerController::class, 'show_about']);
//admin routes

Route::match(['get', 'head'], '/admin/admin', [AdminController::class, 'admin'])->name('admin.admin');
Route::delete('/admin/admin/delepd', [AdminController::class, 'deletePd'])->name('admin.deletepd');
Route::delete('/admin/admin/delect', [AdminController::class, 'deleteCate'])->name('admin.deletect');

Route::match(['get', 'post'], '/admin/admin/add_pd', [AdminController::class, 'add_pd'])->name('admin.add_pd');
Route::match(['get', 'post'], '/admin/admin/add_cate', [AdminController::class, 'add_cate'])->name('admin.add_cate');

Route::match(['get', 'post'], '/admin/admin/change_cate', [AdminController::class, 'get_cate'])->name('admin.change_cate');
Route::match(['get', 'post'], '/admin/admin/change_pd', [AdminController::class, 'get_pd'])->name('admin.change_pd');

 Route::match(['PUT', 'POST'], '/admin/admin/changect', [AdminController::class, 'change_cate'])->name('admin.changect');
 Route::match(['PUT', 'POST'], '/admin/admin/changepd', [AdminController::class, 'change_pd'])->name('admin.changepd');


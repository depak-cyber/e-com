<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class, 'welcome'])->name('welcome'); 
Route::post('add-to-cart',[UserController::class, 'addProduct']);

//Route::post('/add_fav/{id}', [UserController::class, 'add_fav']);

Route::get('/product_details/{id}', [UserController::class, 'product_details'])->name('user.product_details');
Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('admin.update_product');
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('admin.delete_product');
Route::get('/view_product', [AdminController::class, 'view_product'])->name('admin.view_product');
Route::get('/show_product', [AdminController::class, 'show_product'])->name('admin.show_product');
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('admin.update_product_confirm');

Route::post('/add_product', [AdminController::class, 'add_product'])->name('admin.add_product');
Route::post('/add_catagory', [AdminController::class, 'add_catagory'])->name('admin.add_catagory');
Route::get('/view_catagory', [AdminController::class, 'view_catagory'])->name('admin.view_catagory');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/store', [AdminController::class,'store'])->name('admin.store');
Route::get('/admin/login',[AdminController::class, 'login'])->name('admin.login');
Route::get('/delete_catagory/{id}',[AdminController::class, 'delete_catagory'])->name('admin.delete_catagory');
Route::post('/admin/signup', [AdminController::class,'signup'])->name('admin.signup');

Route::get('/user/login',[UserController::class, 'login'])->name('user.login');
Route::get('/user/home',[UserController::class, 'home'])->name('user.home');
Route::get('/user/register',[UserController::class, 'register'])->name('user.register');

Route::post('/user/store', [UserController::class,'store'])->name('user.store');
Route::post('/user/signup', [UserController::class,'signup'])->name('user.signup');
Route::get('/user/forgotpassword',[UserController::class, 'forgotpassword'])->name('user.forgotpassword');

Route::get('/user/product',[UserController::class, 'product'])->name('user.product');



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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



Route::get('/',[ProductController::class, 'index']);
Route::get('/detail/{id}',[ProductController::class, 'detail']);
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::post('register', [UserController::class,'register'])->name('user.register');

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::post('/login',[UserController::class, 'login']);
Route::post('/add_to_cart',[ProductController::class,'add_to_cart']);

Route::get('/cartlist',[ProductController::class, 'cartlist']);
Route::get('/removecart/{id}',[productController::class,'removeCart']);

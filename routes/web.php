<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [App\Http\Controllers\AuthManager::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [App\Http\Controllers\AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [App\Http\Controllers\AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [App\Http\Controllers\AuthManager::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/user/order', [UserController::class, 'showOrderForm'])->name('user.order.form');
    Route::post('/user/order', [UserController::class, 'createOrder'])->name('user.order');
    Route::get('/admin/orders', [AdminController::class, 'viewOrders'])->name('admin.orders');
    Route::put('/admin/order/update/{id}', [AdminController::class, 'updateOrderStatus'])->name('admin.order.update');
    Route::get('/admin/orders/edit/{id}', [AdminController::class, 'editOrder'])->name('admin.orders.edit');
    Route::put('/admin/orders/update/{id}', [AdminController::class, 'updateOrder'])->name('admin.orders.update');
});
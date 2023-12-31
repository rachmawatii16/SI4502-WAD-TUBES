<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [App\Http\Controllers\AuthManager::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [App\Http\Controllers\AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [App\Http\Controllers\AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [App\Http\Controllers\AuthManager::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/payment', [UserController::class, 'showPayment'])->name('user.payment');
    Route::get('/user/order/payment/{orderId}', [UserController::class, 'showPaymentPage'])->name('user.payment');
    Route::post('/user/order/payment/{orderId}/proceed', [UserController::class, 'processPayment'])->name('user.payment.proceed');
    Route::get('/admin/payments', [AdminController::class, 'showPayments'])->name('admin.payments');
    Route::get('/admin/payments/edit/{id}', [AdminController::class, 'editPayment'])->name('admin.payments.edit');
    Route::put('/admin/payments/update/{id}', [AdminController::class, 'updatePayment'])->name('admin.payments.update');
    Route::delete('/admin/payments/delete/{id}', [AdminController::class, 'deletePayment'])->name('admin.payments.delete');

});
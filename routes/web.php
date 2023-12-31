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

    Route::get('/user/home', [App\Http\Controllers\UserController::class, 'home'])->name('user.home');
    Route::get('/user/tenants', [UserController::class, 'showTenants'])->name('user.tenants');
    Route::get('/user/tenant/{tenantId}/menu', [UserController::class, 'showTenantMenu'])->name('user.tenant.menu');

    Route::get('/admin/tenants', [AdminController::class, 'showTenants'])->name('admin.tenants');
    Route::get('/admin/tenants/create', [AdminController::class, 'createTenant'])->name('admin.tenants.create');
    Route::post('/admin/tenants', [AdminController::class, 'storeTenant'])->name('admin.tenants.store');
    Route::get('/admin/tenants/edit/{id}', [AdminController::class, 'editTenant'])->name('admin.tenants.edit');
    Route::put('/admin/tenants/{id}', [AdminController::class, 'updateTenant'])->name('admin.tenants.update');
    Route::delete('/admin/tenants/{id}', [AdminController::class, 'deleteTenant'])->name('admin.tenants.delete');

});
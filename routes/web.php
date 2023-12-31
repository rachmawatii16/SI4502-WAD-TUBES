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
    
    Route::get('/user/order/feedback/{id}', [UserController::class, 'showFeedbackForm'])->name('user.order.feedbackForm');
    Route::get('/admin/feedback', [AdminController::class, 'viewFeedback'])->name('admin.feedback.view');
    Route::delete('/admin/feedback/delete/{id}', [AdminController::class, 'deleteFeedback'])->name('admin.feedback.delete');

});

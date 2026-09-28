<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::middleware('guest')->group(function () { 
    Route::post('/login', [AuthController::class, 'login']); 
}); 
 
Route::middleware('auth')->group(function () {  
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); 
});

Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () { 
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
    Route::post('/login', [AuthController::class, 'login']); 
}); 
 
Route::middleware('auth')->group(function () {  
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); 
});

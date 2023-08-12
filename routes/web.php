<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/apps', [AppController::class, 'index'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/change-password', [AuthController::class, 'change_password']);
Route::post('/change-password', [AuthController::class, 'save_change_password']);
// Route::get('/jwt', [AuthController::class, 'jwt']);

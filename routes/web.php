<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login',[AuthController::class,'login']);
Route::get('/logbook',[LogbookController::class, 'index'])->middleware('auth');
Route::delete('/logbook/{id}',[LogbookController::class, 'destroy'])->middleware('auth');
Route::post('/login',[AuthController::class,'login_process'])->name('login');
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/logbook/public',[LogbookController::class,'store_public']);
Route::put('/logbook/{id}/public',[LogbookController::class,'update_public']);
Route::put('/logbook/{logbook:id}',[LogbookController::class, 'update'])->middleware('auth');
Route::post('/logbook/{logbook:id}/verifikasi',[LogbookController::class, 'verifikasi'])->middleware('auth');
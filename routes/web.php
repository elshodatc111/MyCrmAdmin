<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');
Route::post('/create', [HomeController::class, 'create'])->name('create');
Route::post('/create/sms', [HomeController::class, 'createSms'])->name('createSms');
Route::post('/update/settings', [HomeController::class, 'settings'])->name('settings');
Route::get('/update/{id}', [HomeController::class, 'update'])->name('update');
Route::post('/update', [HomeController::class, 'updatePost'])->name('updatePost');

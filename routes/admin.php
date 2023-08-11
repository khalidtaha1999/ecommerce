<?php

use App\Http\Controllers\Backend\AdminController;

use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::put('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

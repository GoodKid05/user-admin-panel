<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
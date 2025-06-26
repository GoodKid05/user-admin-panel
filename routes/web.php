<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');

Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
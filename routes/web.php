<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');

Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');

Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::patch('/admin/users/{id}',[UserController::class, 'update'])->name('users.update');

Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
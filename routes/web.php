<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('/show-model/{table}', [AdminController::class, 'show_model'])->name('admin.show_model');
Route::get('/create/{table}', [AdminController::class, 'create_model'])->name('admin.create_model');
Route::post('/store/{table}', [AdminController::class, 'store_model'])->name('admin.store_model');

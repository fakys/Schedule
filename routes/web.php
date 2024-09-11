<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\admin\AdminController::class, 'index']);

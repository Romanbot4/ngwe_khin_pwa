<?php

use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminPanelController::class, 'index']);
Route::get('/categories', [AdminPanelController::class, 'categories']);
Route::get('/category', [AdminPanelController::class, 'categoryTableData']);

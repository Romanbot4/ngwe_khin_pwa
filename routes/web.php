<?php

use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminPanelController::class, 'login'])->name('login');
Route::post('/login', [AdminPanelController::class, 'handleLogin'])->name('login');

Route::post('/logout', [AdminPanelController::class, 'logout'])->name('logout');

Route::get('/signup', [AdminPanelController::class, 'signup'])->name('signup');
Route::post('/signup', [AdminPanelController::class, 'handleSignup'])->name('signup');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminPanelController::class, 'index']);
    Route::get('/category', [AdminPanelController::class, 'categories']);
    Route::get('/category-table', [AdminPanelController::class, 'categoryTableData']);
    Route::get('/user', [AdminPanelController::class, 'users']);
    Route::get('/user-table', [AdminPanelController::class, 'userTableData']);
});

<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Api\V1\TransactionCategoryController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\TransactionCategoryViewController;
use App\Http\Controllers\UserViewController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminPanelController::class, 'login'])->name('login');
Route::post('/login', [AdminPanelController::class, 'handleLogin'])->name('login');

Route::post('/logout', [AdminPanelController::class, 'logout'])->name('logout');

Route::get('/signup', [AdminPanelController::class, 'signup'])->name('signup');
Route::post('/signup', [AdminPanelController::class, 'handleSignup'])->name('signup');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminPanelController::class, 'index']);

    Route::controller(TransactionCategoryViewController::class)->group(function () {
        Route::get('/category', 'category');
        Route::get('/category-table', 'categoryTableData');
    });
    Route::delete('/category-delete/{category}', [TransactionCategoryController::class, 'destroy']);

    Route::controller(UserViewController::class)->group(function () {
        Route::get('/user', 'user');
        Route::get('/user-table', 'userTableData');
        Route::get('/profile/{user}', 'userProfile');
    });
    Route::post('/profile-update/{user}', [UserController::class, 'updateProfile']);

    // Route::get('/user', [AdminPanelController::class, 'users']);
    // Route::get('/user-table', [AdminPanelController::class, 'userTableData']);
});

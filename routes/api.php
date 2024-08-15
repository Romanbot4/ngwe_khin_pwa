<?php

use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/sign-up', [AuthenticationController::class, 'signUp']);
Route::post('/sign-in', [AuthenticationController::class, 'signIn']);

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transaction', 'all');
        Route::get('/transaction/{transaction}', 'showGlobal');
        Route::post('/transaction', 'storeGlobal');
        Route::post('/transaction/{transaction}', 'updateGlobal');
        Route::delete('/transaction/{transaction}', 'destroyGlobal');
    });

    Route::prefix('user')->group(function () {
        Route::controller(TransactionController::class)->group(function () {
            Route::get('{user}/transaction', 'index');
            Route::get('{user}/transaction/{transaction}', 'show');
            Route::post('{user}/transaction', 'store');
            Route::post('{user}/transaction/{transaction}', 'update');
            Route::delete('{user}/transaction/{transaction}', 'destroy');
        });
    });
});

<?php

use App\Http\Controllers\Api\V1\BankingProviderController;
use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/sign-up', [AuthenticationController::class, 'signUp']);
Route::post('/login', [AuthenticationController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

        Route::controller(BankingProviderController::class)->group(function () {
            Route::get('/banking-provider', 'index');
            Route::get('/banking-provider/{id}', 'show');
            Route::post('/banking-provider', 'store');
            Route::delete('/banking-provider/{id}', 'destroy');
            Route::put('/banking-provider/{id}', 'update');
        });

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
});

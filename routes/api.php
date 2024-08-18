<?php

use App\Http\Controllers\Api\V1\BankingProviderController;
use App\Http\Controllers\Api\V1\TransactionCategoryController;
use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\AuthenticationController;
use App\Models\TransactionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/sign-up', [AuthenticationController::class, 'signUp']);
Route::post('/login', [AuthenticationController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

        Route::prefix('banking-provider')->group(function () {
            Route::controller(BankingProviderController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{bankingProvider}', 'show');
                Route::post('/', 'store');
                Route::post('/{bankingProvider}', 'update');
                Route::delete('/{bankingProvider}', 'destroy');
            });
        });

        Route::prefix('categories')->group(function () {
            Route::controller(TransactionCategoryController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{category}', 'show');
                Route::post('/', 'store');
                Route::post('/{category}', 'update');
                Route::delete('/{category}', 'destroy');
            });
        });

        Route::prefix('transaction')->group(function () {
            Route::controller(TransactionController::class, function () {
                Route::get('/', 'all');
                Route::get('/{transaction}', 'showGlobal');
                Route::post('/', 'storeGlobal');
                Route::post('/{transaction}', 'updateGlobal');
                Route::delete('/{transaction}', 'destroyGlobal');
            });
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

<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('2020')->group(function() {
    Route::get('/shops', [ShopController::class, 'index']);
    Route::get('/shops/{shopId}', [ShopController::class, 'show']);
    Route::get('/items/{itemId}', [ItemController::class, 'show']);
    Route::post('/order/{shopId}', [OrderController::class, 'store']);
    
    Route::middleware('token')->group(function() {
        Route::put('/shops', [ShopController::class, 'update']);
        Route::post('/items', [ItemController::class, 'store']);
        Route::put('/items/{itemId}', [ItemController::class, 'update']);
        Route::delete('/items/{itemId}', [ItemController::class, 'destroy']);
    });
});

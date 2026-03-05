<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);
Route::apiResource('products', ProductController::class)->only(['index', 'show']);
Route::apiResource('product-images', ProductImageController::class)->only(['index', 'show']);

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('categories', CategoryController::class)->except(['index', 'show']);
    Route::apiResource('products', ProductController::class)->except(['index', 'show']);
    Route::apiResource('product-images', ProductImageController::class)->except(['index', 'show']);
});

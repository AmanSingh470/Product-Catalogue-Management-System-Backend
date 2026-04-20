<?php

use App\Http\Controllers\API\FilterProductController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductRequestFormController;
use Illuminate\Support\Facades\Route;

Route::apiResource('get-products', ProductController::class);
Route::apiResource('get-filters', FilterProductController::class);
Route::apiResource('product-request-form', ProductRequestFormController::class);
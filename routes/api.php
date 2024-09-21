<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProviderController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:customer')->group(function ($request) {
    Route::get('/providers', [ProviderController::class, 'index']);
    Route::get('/provider/{id}', [ProviderController::class, 'show']);
// });

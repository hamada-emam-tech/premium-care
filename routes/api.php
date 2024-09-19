<?php

use App\Models\Provider;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/providers', [Provider::class, 'index']);
    Route::get('/provider/{id}', [Provider::class, 'show']);
});

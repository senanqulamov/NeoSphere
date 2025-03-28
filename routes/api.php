<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SphereController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Require Auth)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Spheres
    Route::apiResource('spheres', SphereController::class);

    // User Profile
    Route::get('/profile', [AuthController::class, 'profile']);
});

Route::get('/search', [SearchController::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\DB;

Route::get('/', [ThemeController::class, 'home'])->name('home');

Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['message' => 'Database connection is successful'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Database connection failed: ' . $e->getMessage()], 500);
    }
});


Route::get('/session-check', function () {
    $sessionDriver = config('session.driver');
    return response()->json(['session_driver' => $sessionDriver], 200);
});

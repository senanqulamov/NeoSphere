<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;


Route::get('/', [ThemeController::class, 'home'])->name('home');

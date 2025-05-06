<?php

use App\Http\Controllers\FronController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sumbit', [FronController::class, 'show']);
Route::post('/register', [FronController::class, 'store'])->name('store');
Route::post('/login', [FronController::class, 'login'])->name('login');
<?php

use App\Http\Controllers\FronController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FronController::class, 'formControoler'])->name('home');
Route::post('/created-store', [FronController::class, 'store'])->name('store');
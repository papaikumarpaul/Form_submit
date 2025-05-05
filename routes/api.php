<?php

use App\Http\Controllers\FronController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::get('/test', function (Request $request) {
//     return ["name" => "papai kumar paul"];
// });
Route::get('/sumbit', [FronController::class, 'show']);
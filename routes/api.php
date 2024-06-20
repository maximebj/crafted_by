<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Grouper les routes protégées par Sanctum
// Route::middleware('auth:sanctum')->group(function () {
//   Route::get('/user', [AuthController::class, 'user']);
//   Route::post('/logout', [AuthController::class, 'logout']);
// });

Route::apiResource('products', ProductController::class);
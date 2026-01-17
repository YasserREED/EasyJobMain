<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // User endpoints
    Route::get('/user/profile', [\App\Http\Controllers\Api\UserController::class, 'profile']);
    Route::put('/user/profile', [\App\Http\Controllers\Api\UserController::class, 'updateProfile']);

    // CV endpoints
    Route::get('/cvs', [\App\Http\Controllers\Api\CvController::class, 'index']);
    Route::get('/cvs/{id}', [\App\Http\Controllers\Api\CvController::class, 'show']);
    Route::post('/cvs', [\App\Http\Controllers\Api\CvController::class, 'store'])->middleware('throttle:10,1');

    // Payment endpoints
    Route::get('/payments', [\App\Http\Controllers\Api\PaymentController::class, 'index']);
    Route::get('/payments/{id}', [\App\Http\Controllers\Api\PaymentController::class, 'show']);
});

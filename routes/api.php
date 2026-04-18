<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CharacterController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/characters/{character}', [CharacterController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/characters', [CharacterController::class, 'store']);
    Route::put('/characters/{character}', [CharacterController::class, 'update']);
    Route::patch('/characters/{character}', [CharacterController::class, 'update']);
    Route::delete('/characters/{character}', [CharacterController::class, 'destroy']);
});

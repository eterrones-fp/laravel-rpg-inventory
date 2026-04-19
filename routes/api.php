<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\InventoryController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/characters/{character}', [CharacterController::class, 'show']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{item}', [ItemController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/characters', [CharacterController::class, 'store']);
    Route::put('/characters/{character}', [CharacterController::class, 'update']);
    Route::patch('/characters/{character}', [CharacterController::class, 'update']);
    Route::delete('/characters/{character}', [CharacterController::class, 'destroy']);
    Route::post('/items', [ItemController::class, 'store']);
    Route::put('/items/{item}', [ItemController::class, 'update']);
    Route::delete('/items/{item}', [ItemController::class, 'destroy']);
    Route::get('/characters/{character}/inventory', [InventoryController::class, 'index']);
Route::put('/characters/{character}/inventory', [InventoryController::class, 'upsert']);
});

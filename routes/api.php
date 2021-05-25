<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);


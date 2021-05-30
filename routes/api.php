<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ListeAmendesController;
use App\Http\Controllers\HistoriqueAmendesController;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);

Route::apiResource('citoyens', CitoyenController::class);
Route::apiResource('vehicules', VehiculeController::class);
Route::apiResource('liste_amendes', ListeAmendesController::class);
Route::apiResource('historique_amendes', HistoriqueAmendesController::class);

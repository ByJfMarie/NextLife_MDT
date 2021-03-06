<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CoffreController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\BraceletController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\AccessTokenController;
use App\Http\Controllers\ListeAmendesController;
use App\Http\Controllers\RapportAgentController;
use App\Http\Controllers\HistoriqueAmendesController;
use App\Http\Controllers\RapportArresationController;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);

Route::apiResource('citoyens', CitoyenController::class);
Route::apiResource('vehicules', VehiculeController::class);
Route::apiResource('liste_amendes', ListeAmendesController::class);
Route::apiResource('historique_amendes', HistoriqueAmendesController::class);
Route::apiResource('bracelet', BraceletController::class);
Route::apiResource('grades', GradeController::class);
Route::apiResource('access_token', AccessTokenController::class);
Route::apiResource('coffre', CoffreController::class);
Route::apiResource('rapport_arrestation', RapportArresationController::class);
Route::apiResource('rapport_agent', RapportAgentController::class);

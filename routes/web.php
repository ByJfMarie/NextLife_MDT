<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\VehiculeController;

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

Route::resource('taj/citoyens', CitoyenController::class);
Route::resource('siv/vehicules', VehiculeController::class);
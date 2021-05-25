<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitoyenController;

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

Route::resource('citoyens', CitoyenController::class);
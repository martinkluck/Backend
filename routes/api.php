<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\VehicleController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/people', [PeopleController::class, 'getAll']);
    Route::get('/people/{id}', [PeopleController::class, 'getById']);
    Route::get('/planets', [PlanetController::class, 'getAll']);
    Route::get('/planets/{id}', [PlanetController::class, 'getById']);
    Route::get('/vehicles', [VehicleController::class, 'getAll']);
    Route::get('/vehicles/{id}', [VehicleController::class, 'getById']);
});

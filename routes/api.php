<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatchResultController;
use App\Http\Controllers\MatchScheduleController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TeamController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth.token')->group(function () {

    Route::get('/teams', [TeamController::class, 'index']);
    Route::post('/teams', [TeamController::class, 'store']);
    Route::put('/teams/{id}', [TeamController::class, 'update']);
    Route::delete('/teams/{id}', [TeamController::class, 'destroy']);

    Route::get('/players', [PlayerController::class, 'index']);
    Route::get('/players/{id}', [PlayerController::class, 'show']);
    Route::post('/players', [PlayerController::class, 'store']);
    Route::put('/players/{id}', [PlayerController::class, 'update']);
    Route::delete('/players/{id}', [PlayerController::class, 'destroy']);

    Route::get('/matches', [MatchScheduleController::class, 'index']);
    Route::get('/matches/{id}', [MatchScheduleController::class, 'show']);
    Route::post('/matches', [MatchScheduleController::class, 'store']);
    Route::put('/matches/{id}', [MatchScheduleController::class, 'update']);
    Route::delete('/matches/{id}', [MatchScheduleController::class, 'destroy']);

    Route::get('/results', [MatchResultController::class, 'index']);
    Route::get('/results/{id}', [MatchResultController::class, 'show']);
    Route::post('/results', [MatchResultController::class, 'store']);
    Route::put('/results/{id}', [MatchResultController::class, 'update']);
    Route::delete('/results/{id}', [MatchResultController::class, 'destroy']);

    Route::get('/report/matches', [ReportController::class,'matchReport']);
});

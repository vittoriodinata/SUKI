
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;

Route::get('/competitions', [CompetitionController::class, 'index']);
Route::get('/competitions/{id}', [CompetitionController::class, 'show']);
Route::post('/competitions', [CompetitionController::class, 'store']);
Route::put('/competitions/{id}', [CompetitionController::class, 'update']);
Route::delete('/competitions/{id}', [CompetitionController::class, 'destroy']);

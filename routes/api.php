<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnabolizantesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/anabolizantes', [AnabolizantesController::class, 'store']);
Route::get('/anabolizantes', [AnabolizantesController::class, 'index']);
Route::get('/anabolizantes/{id}', [AnabolizantesController::class, 'show']);
Route::put('/anabolizantes/{id}', [AnabolizantesController::class, 'update']);
Route::delete('/anabolizantes/{id}', [AnabolizantesController::class, 'destroy']);
Route::patch('/anabolizantes/{id}', [AnabolizantesController::class, 'updateParcial']);
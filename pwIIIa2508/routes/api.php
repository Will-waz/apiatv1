<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/produtos', [ProdutosController::class, 'store']);
Route::get('/produtos', [ProdutosController::class, 'index']);
Route::get('/produtos/{id}', [ProdutosController::class, 'show']);
Route::put('/produtos/{id}', [ProdutosController::class, 'update']);
Route::delete('/produtos/{id}', [ProdutosController::class, 'destroy']);
Route::patch('/produtos/{id}', [ProdutosController::class, 'updateParcial']);
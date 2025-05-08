<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
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

Route::get('/veiculos', [VeiculoController::class, 'index']);
Route::post('/veiculos', [VeiculoController::class, 'store']);
Route::get('/veiculos/{id}', [VeiculoController::class, 'show']);
Route::put('/veiculos/{id}', [VeiculoController::class, 'update']);
Route::patch('/veiculos/{id}', [VeiculoController::class, 'updateParcial']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

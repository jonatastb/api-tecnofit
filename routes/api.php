<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\RankingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(RankingController::class)->group(function () {
        Route::get('/ranking', 'index');
        Route::get('/ranking/{id}', 'show')->where('id', '[0-9]+');
    }); 
});


Route::fallback(function () {
    return BaseController::errorResponse(400, [
        'error' => 'Not Found',
        'message' => 'Esta rota não existe ou você não tem permissao.'
    ]);
});

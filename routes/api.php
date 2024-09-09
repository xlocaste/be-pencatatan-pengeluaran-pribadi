<?php

use App\Http\Controllers\JenisPengeluaranController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::post('/pengeluaran', [PengeluaranController::class, 'store']);
Route::get('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'show']);
Route::put('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'update']);
Route::delete('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroy']);

Route::get('/jenis-pengeluaran', [JenisPengeluaranController::class, 'index']);
Route::post('/jenis-pengeluaran', [JenisPengeluaranController::class, 'store']);
Route::get('/jenis-pengeluaran/{jenisPengeluaran}', [JenisPengeluaranController::class, 'show']);
Route::put('/jenis-pengeluaran/{jenisPengeluaran}', [JenisPengeluaranController::class, 'update']);
Route::delete('/jenis-pengeluaran/{jenisPengeluaran}', [JenisPengeluaranController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

<?php
use App\Http\Controllers\WinnerController;

// Obtener ganadores con paginación
Route::get('/winners', [WinnerController::class, 'index']);

// Generar 1000 ganadores aleatorios
Route::post('/winners/generate', [WinnerController::class, 'generate']);

// Actualizar un ganador específico
Route::put('/winners/{id}', [WinnerController::class, 'update']);

// Eliminar un ganador (SoftDelete)
Route::delete('/winners/{id}', [WinnerController::class, 'destroy']);

// Restaurar un ganador eliminado
Route::put('/winners/{id}/restore', [WinnerController::class, 'restore']);
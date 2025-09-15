<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('tasks', [TaskController::class, 'index']);
    Route::get('tasks/{id}', [TaskController::class, 'getTask']);
    Route::post('tasks', [TaskController::class, 'createTask']);
    Route::delete('tasks/{id}', [TaskController::class, 'deleteTask']);
    Route::put('tasks/{id}', [TaskController::class, 'updateTask']);
});

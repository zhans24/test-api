<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('tasks', [TaskController::class, 'index']);
Route::get('tasks/{id}', [TaskController::class, 'getTask']);
Route::post('tasks', [TaskController::class, 'createTask']);
Route::put('tasks/{id}', [TaskController::class, 'updateTask']);
Route::delete('tasks/{id}', [TaskController::class, 'deleteTask']);



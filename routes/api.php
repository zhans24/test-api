<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('tasks', 'TaskController@getTasks');
    Route::get('tasks/{id}', 'TaskController@getTask');
    Route::post('tasks', 'TaskController@createTask');
    Route::delete('tasks/{id}', 'TaskController@deleteTask');
    Route::put('tasks/{id}', 'TaskController@updateTask');
});

<?php

namespace App\Http\Controllers;

use App\Application\Task\UseCases\CreateTask;
use App\Application\Task\UseCases\DeleteTask;
use App\Application\Task\UseCases\GetTasks;
use App\Application\Task\UseCases\GetTask;
use App\Application\Task\UseCases\UpdateTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(GetTasks $usecase)
    {
        return response()->json($usecase->execute());
    }

    public function getTask(int $id, GetTask $usecase){
        return response()->json([$usecase->execute($id)]);
    }

    public function createTask(Request $request, CreateTask $usecase){
        return response()->json([$usecase->execute($request->input('title'), $request->input('description'))]);
    }
    public function updateTask(Request $request, UpdateTask $usecase){
        return response()->json($usecase->execute($request->input('id'),$request->input('title'), $request->input('description'),$request->input('status')));
    }
    public function deleteTask(int $id, DeleteTask $usecase){
        $usecase->execute($id);
        return response()->json(['message' => 'Task deleted']);
    }
}

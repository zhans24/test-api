<?php

namespace App\Http\Controllers;

use App\Application\Task\UseCases\CreateTask;
use App\Application\Task\UseCases\DeleteTask;
use App\Application\Task\UseCases\GetTasks;
use App\Application\Task\UseCases\GetTask;
use App\Application\Task\UseCases\UpdateTask;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index(GetTasks $usecase)
    {
        $tasks = $usecase->execute();

        return response()->json(
            array_map(fn($task) => $task->toArray(), $tasks)
        );
    }

    public function getTask(int $id, GetTask $usecase)
    {
        $task = $usecase->execute($id);

        return $task
            ? response()->json($task->toArray())
            : response()->json(['message' => 'Task not found'], 404);
    }

    public function createTask(CreateTaskRequest $request, CreateTask $usecase)
    {
        $task = $usecase->execute(
            $request->input('title'),
            $request->input('description')
        );

        return response()->json($task->toArray(), 201);
    }

    public function updateTask(int $id, UpdateTaskRequest $request, UpdateTask $usecase)
    {
        $task = $usecase->execute(
            $id,
            $request->input('title'),
            $request->input('description'),
            $request->input('status')
        );

        return $task
            ? response()->json($task->toArray())
            : response()->json(['message' => 'Task not found'], 404);
    }


    public function deleteTask(int $id, DeleteTask $usecase)
    {
        $usecase->execute($id);

        return response()->json(['message' => 'Task deleted']);
    }
}

<?php

namespace App\Application\Task\UseCases;

use App\Domain\Entities\Task;
use App\Infrastructure\Repositories\TaskRepository;

class CreateTask
{
    public function __construct(private TaskRepository $taskRepository)
    {}

    public function execute(string $title,string $description) : Task
    {
        $task = new Task(null,$title, $description,false);
        return $this->taskRepository->save($task);
    }

}

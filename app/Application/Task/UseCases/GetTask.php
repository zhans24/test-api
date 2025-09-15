<?php

namespace App\Application\Task\UseCases;

use App\Domain\Entities\Task;
use App\Domain\Interfaces\TaskRepositoryInterface;

class GetTask
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
    }

    public function execute(int $id): Task
    {
        return $this->taskRepository->getById($id);
    }
}

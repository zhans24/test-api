<?php

namespace App\Application\Task\UseCases;

use App\Domain\Interfaces\TaskRepositoryInterface;

class GetTasks
{
    public function __construct(private TaskRepositoryInterface $tasks) {}

    public function execute(): array
    {
        return $this->tasks->getAll();
    }
}

<?php

namespace App\Application\Task\UseCases;

use App\Domain\Interfaces\TaskRepositoryInterface;

class DeleteTask
{
    public function __construct(private TaskRepositoryInterface $tasks) {}

    public function execute(int $id): void
    {
        $this->tasks->deleteById($id);
    }
}

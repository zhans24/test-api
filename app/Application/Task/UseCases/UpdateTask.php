<?php

namespace App\Application\Task\UseCases;

use App\Domain\Entities\Task;
use App\Domain\Interfaces\TaskRepositoryInterface;

class UpdateTask
{
    public function __construct(private TaskRepositoryInterface $taskRepository){
    }

    public function execute(int $id,string $title,string $description,bool $status) : Task
    {
        $task=new Task($id,$title, $description,$status);
        return $this->taskRepository->update($task);
    }
}

<?php

namespace App\Domain\Interfaces;

use App\Domain\Entities\Task;

interface TaskRepositoryInterface
{
    public function getAll() : array;
    function getById($id) : ?Task;
    function deleteById($id) : void;
    function update(Task $task) : ?Task;
    function save(Task $task) : Task;
}

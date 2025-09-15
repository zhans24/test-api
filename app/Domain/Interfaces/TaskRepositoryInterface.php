<?php

namespace App\Domain\Interfaces;

use App\Domain\Entities\Task;

interface TaskRepositoryInterface
{
    public function getAll() : array;
    function getById($id) : ?Task;
    function deleteById($id) : void;
    function updateById($id, $data) : bool;
    function save($data) : Task;
}

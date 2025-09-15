<?php

namespace App\Domain\Entities;

class Task
{
    public function __construct(
        private int $id,
        private string $title,
        private string $description,
        private bool $status,
    )
    {}
}

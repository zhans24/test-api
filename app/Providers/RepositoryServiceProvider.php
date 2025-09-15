<?php

namespace App\Providers;

use App\Domain\Interfaces\TaskRepositoryInterface;
use App\Infrastructure\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    public function boot(): void
    {
        //
    }
}

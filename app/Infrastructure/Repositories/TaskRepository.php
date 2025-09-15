<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Task as EntityTask;
use App\Domain\Interfaces\TaskRepositoryInterface;
use App\Infrastructure\Models\Task as EloquentTask;
use Illuminate\Support\Facades\Log;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAll(): array
    {
        return EloquentTask::all()
            ->map(fn($model) => $this->mapToEntity($model))
            ->all();
    }

    public function getById($id): ?EntityTask
    {
        $model = EloquentTask::find($id);
        return $model ? $this->mapToEntity($model) : null;
    }

    public function deleteById($id): void
    {
        EloquentTask::destroy($id);
    }

    public function save(EntityTask $task): EntityTask
    {
        $model = new EloquentTask();
        $model->title = $task->getTitle();
        $model->description = $task->getDescription();
        $model->status = $task->getStatus();
        $model->save();

        return $this->mapToEntity($model);
    }

    public function update(EntityTask $task): ?EntityTask
    {
        if (!$task->getId()) {
            return null;
        }

        $model = EloquentTask::find($task->getId());
        if (!$model) {
            return null;
        }

        $model->title = $task->getTitle();
        $model->description = $task->getDescription();
        $model->status = $task->getStatus();
        $model->save();

        return $this->mapToEntity($model);
    }

    private function mapToEntity(EloquentTask $model): EntityTask
    {
        return new EntityTask(
            $model->id,
            $model->title,
            $model->description,
            $model->status
        );
    }
}


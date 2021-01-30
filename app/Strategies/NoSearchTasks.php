<?php

declare(strict_types=1);

namespace App\Strategies;

use App\Models\TodoList;
use Illuminate\Database\Eloquent\Builder;

class NoSearchTasks implements TaskableStrategy
{
    /**
     * @inheritDoc
     */
    public function getTasks(): Builder
    {
        return TodoList::tasks();
    }
}

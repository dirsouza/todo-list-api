<?php

declare(strict_types=1);

namespace App\Factories;

use App\Strategies\NoSearchTasks;
use App\Strategies\SearchTasks;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TasksFactory implements TaskableFactory
{
    /**
     * @var Request $request
     */
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function make(): Builder
    {
        return count($this->request->except(['page', 'perPage'])) ?
            $this->searchTasksInstance() :
            $this->noSearchTasksInstance();
    }

    /**
     * @return Builder
     */
    private function searchTasksInstance(): Builder
    {
        return (new SearchTasks())->getTasks();
    }

    /**
     * @return Builder
     */
    private function noSearchTasksInstance(): Builder
    {
        return (new NoSearchTasks())->getTasks();
    }
}

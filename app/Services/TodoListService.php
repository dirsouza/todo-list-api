<?php

declare(strict_types=1);

namespace App\Services;

use App\Factories\TasksFactory;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoListService
{
    /**
     * @var TodoList
     */
    private TodoList $todoList;

    public function __construct(TodoList $todoList)
    {
        $this->todoList = $todoList;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getTasks(Request $request): array
    {
        try {
            $tasks = (new TasksFactory($request))
                ->make()
                ->paginate($request->perPage);

            throw_if(!$tasks, \Exception::class, trans('messages.tasks.notFound'), 404);

            return [
                'success' => true,
                'data' => $tasks,
                'code' => 200
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'code' => $e->getCode()
            ];
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function createTask(Request $request): array
    {
        DB::beginTransaction();

        try {
            $task = $this->todoList->create([
                'title' => $request->title,
                'description' => $request->description,
                'archived' => $request->archived ?? false,
                'completed' => $request->completed ?? false,
            ]);

            throw_if(!$task->exists(), \Exception::class, trans('messages.tasks.errorRegister'), 500);

            DB::commit();

            return [
                'success' => true,
                'message' => trans('messages.tasks.successRegister'),
                'data' => $this->todoList->find($task->id),
                'code' => 201,
            ];
        } catch (\Throwable $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'code' => $e->getCode()
            ];
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return array
     */
    public function updateTask(int $id, Request $request): array
    {
        DB::beginTransaction();

        try {
            $task = $this->todoList->find($id);

            throw_if(!$task, \Exception::class, trans('messages.tasks.notFound'), 404);

            $result = $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'archived' => $request->archived ?? false,
                'completed' => $request->completed ?? false,
            ]);

            throw_if(!$result, \Exception::class, trans('messages.tasks.errorUpdate'), 500);

            DB::commit();

            return [
                'success' => true,
                'message' => trans('messages.tasks.successUpdate'),
                'data' => $this->todoList->find($task->id),
                'code' => 200,
            ];
        } catch (\Throwable $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'code' => $e->getCode()
            ];
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function deleteTask(int $id): array
    {
        DB::beginTransaction();

        try {
            $task = $this->todoList->find($id);

            throw_if(!$task, \Exception::class, trans('messages.tasks.notFound'), 404);

            $result = $task->delete();

            throw_if(!$result, \Exception::class, trans('messages.tasks.errorDelete'), 500);

            DB::commit();

            return [
                'success' => true,
                'message' => trans('messages.tasks.successDelete'),
                'data' => null,
                'code' => 200,
            ];
        } catch (\Throwable $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'code' => $e->getCode()
            ];
        }
    }
}

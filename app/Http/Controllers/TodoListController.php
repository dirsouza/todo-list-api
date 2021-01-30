<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TodoListService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class TodoListController extends Controller
{
    /**
     * @var TodoListService
     */
    private TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $tasks = $this->todoListService->getTasks();

        return $this->response($tasks);
    }

    /**
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function create(TaskRequest $request): JsonResponse
    {
        $task = $this->todoListService->createTask($request);

        return $this->response($task);
    }

    /**
     * @param int $id
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function update(int $id, TaskRequest $request): JsonResponse
    {
        $task = $this->todoListService->updateTask($id, $request);

        return $this->response($task);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $task = $this->todoListService->deleteTask($id);

        return $this->response($task);
    }

    /**
     * @param array $response
     * @return JsonResponse
     */
    private function response(array $response): JsonResponse
    {
        return response()
            ->json(Arr::except($response, 'code'))
            ->setStatusCode($response['code']);
    }
}

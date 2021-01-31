<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TodoListService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * @OA\Tag(
 *     name="To-Do List",
 *     description="API Endpoints of Tasks"
 * )
 */
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
     * @OA\Get(
     *     path="/api/v1/tasks",
     *     tags={"To-Do List"},
     *     summary="Find tasks",
     *     description="Get the paged list of tasks",
     *     operationId="list",
     *
     *     @OA\Parameter(
     *          name="page",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              default=1
     *          )
     *     ),
     *
     *     @OA\Parameter(
     *          name="perPage",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              default=15
     *          )
     *     ),
     *
     *     @OA\Parameter(
     *          name="search",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *
     *     @OA\Parameter(
     *          name="archived",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *
     *     @OA\Parameter(
     *          name="completed",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TodoListPaginedResponseDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseDTO")
     *     ),
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $tasks = $this->todoListService->getTasks($request);

        return $this->response($tasks);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/tasks/{id}",
     *     tags={"To-Do List"},
     *     summary="Find task",
     *     description="Find a task",
     *     operationId="task",
     *
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              default=1
     *          )
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TodoListResponseDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseDTO")
     *     ),
     * )
     *
     * @param int $id
     * @return JsonResponse
     */
    public function task(int $id): JsonResponse
    {
        $task = $this->todoListService->getTask($id);

        return $this->response($task);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/tasks/create",
     *     tags={"To-Do List"},
     *     summary="Create tasks",
     *     description="Create a new task",
     *     operationId="create",
     *
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TodoListCreateOrUpdateDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TodoListResponseDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorRequestDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseDTO"),
     *     ),
     * )
     *
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function create(TaskRequest $request): JsonResponse
    {
        $task = $this->todoListService->createTask($request);

        return $this->response($task);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/tasks/update/{id}",
     *     tags={"To-Do List"},
     *     summary="Update tasks",
     *     description="Update a task",
     *     operationId="update",
     *
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              default=1
     *          )
     *     ),
     *
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TodoListCreateOrUpdateDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TodoListResponseDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorRequestDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseDTO"),
     *     ),
     * )
     *
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
     * @OA\Delete(
     *     path="/api/v1/tasks/delete/{id}",
     *     tags={"To-Do List"},
     *     summary="Delete tasks",
     *     description="Delete a task",
     *     operationId="delete",
     *
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              default=1
     *          )
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TodoListDeleteResponseDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseDTO")
     *     ),
     *
     *     @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponseDTO"),
     *     ),
     * )
     *
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

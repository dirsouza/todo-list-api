<?php

namespace App\DTO;

/**
 * @OA\Schema(
 *     title="TodoListResponseDTO",
 *     description="TodoList Response",
 *     @OA\Xml(
 *          name="TodoListResponse"
 *     )
 * )
 */
class TodoListResponseDTO
{
    /**
     * @OA\Property(
     *     title="success",
     *     type="boolean",
     *     example=true,
     * )
     *
     * @var bool $success
     */
    private bool $success;

    /**
     * @OA\Property(
     *     title="message",
     *     type="string",
     *     example="Task found successfully.",
     * )
     *
     * @var string $message
     */
    private string $message;

    /**
     * @OA\Property(
     *     title="data",
     * )
     *
     * @var TodoListDTO $data
     */
    private TodoListDTO $data;
}

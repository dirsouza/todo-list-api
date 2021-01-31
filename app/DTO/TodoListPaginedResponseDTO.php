<?php

namespace App\DTO;

/**
 * @OA\Schema(
 *     title="TodoListPaginedResponseDTO",
 *     description="TodoList Pagined Response",
 *     @OA\Xml(
 *          name="TodoListPaginedResponse"
 *     )
 * )
 */
class TodoListPaginedResponseDTO
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
     *     example="Tasks successfully listed.",
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
     * @var TodoListPaginedDTO $data
     */
    private TodoListPaginedDTO $data;
}

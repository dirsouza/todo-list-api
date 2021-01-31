<?php

namespace App\DTO;

/**
 * @OA\Schema(
 *     title="TodoListDeleteResponseDTO",
 *     description="TodoList Delete Response",
 *     @OA\Xml(
 *          name="TodoListDeleteResponse"
 *     )
 * )
 */
class TodoListDeleteResponseDTO
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
     *     example="Task successfully deleted.",
     * )
     *
     * @var string $message
     */
    private string $message;

    /**
     * @OA\Property(
     *     title="data",
     *     type="string",
     *     example=null,
     * )
     *
     * @var string $data
     */
    private string $data;
}

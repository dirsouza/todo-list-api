<?php

namespace App\DTO;

/**
 * @OA\Schema(
 *     title="TodoListDTO",
 *     description="TodoList Model",
 *     required={"title"},
 *     @OA\Xml(
 *          name="TodoList"
 *     )
 * )
 */
class TodoListDTO
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="ID of task",
     *     format="int64",
     *     type="integer",
     *     example=1,
     * )
     *
     * @var int $id
     */
    private int $id;

    /**
     * @OA\Property(
     *     title="title",
     *     description="Title of task",
     *     type="string",
     *     example="My first tasks",
     * )
     *
     * @var string $title
     */
    private string $title;

    /**
     * @OA\Property(
     *     title="description",
     *     description="Description of task",
     *     type="string",
     *     example="Description my first tasks",
     * )
     *
     * @var string $description
     */
    private string $description;

    /**
     * @OA\Property(
     *     title="archived",
     *     description="Defines whether the task it is archived",
     *     type="boolean",
     *     example=0,
     * )
     *
     * @var bool $archived
     */
    private bool $archived;

    /**
     * @OA\Property(
     *     title="completed",
     *     description="Defines whether the task it is completed",
     *     type="boolean",
     *     example=0,
     * )
     *
     * @var bool $completed
     */
    private bool $completed;
}

<?php

namespace App\DTO;

/**
 * @OA\Schema(
 *     title="TodoListPaginedDTO",
 *     description="TodoList Pagined",
 *     @OA\Xml(
 *          name="TodoListPagined"
 *     )
 * )
 */
class TodoListPaginedDTO
{
    /**
     * @OA\Property(
     *     title="current_page",
     *     format="int64",
     *     type="integer",
     *     example=1,
     * )
     *
     * @var int $current_page
     */
    private int $current_page;

    /**
     * @OA\Property(
     *     title="data",
     * )
     *
     * @var TodoListDTO[] $data
     */
    private array $data;

    /**
     * @OA\Property(
     *     title="first_page_url",
     *     type="string",
     *     example="http://localhost.com/api/v1/tasks?page=1",
     * )
     *
     * @var string $first_page_url
     */
    private string $first_page_url;

    /**
     * @OA\Property(
     *     title="from",
     *     format="int64",
     *     type="integer",
     *     example=1,
     * )
     *
     * @var int $from
     */
    private int $from;

    /**
     * @OA\Property(
     *     title="from",
     *     format="int64",
     *     type="integer",
     *     example=3,
     * )
     *
     * @var int $last_page
     */
    private int $last_page;

    /**
     * @OA\Property(
     *     title="last_page_url",
     *     type="string",
     *     example="http://localhost.com/api/v1/tasks?page=3",
     * )
     *
     * @var string $last_page_url
     */
    private string $last_page_url;

    /**
     * @OA\Property(
     *     title="next_page_url",
     *     type="string",
     *     example="http://localhost.com/api/v1/tasks?page=2",
     * )
     *
     * @var string $next_page_url
     */
    private string $next_page_url;

    /**
     * @OA\Property(
     *     title="path",
     *     type="string",
     *     example="http://localhost.com/api/v1/tasks",
     * )
     *
     * @var string $path
     */
    private string $path;

    /**
     * @OA\Property(
     *     title="per_page",
     *     type="string",
     *     example="15",
     * )
     *
     * @var string $per_page
     */
    private string $per_page;

    /**
     * @OA\Property(
     *     title="prev_page_url",
     *     type="string",
     *     example=null,
     * )
     *
     * @var string $prev_page_url
     */
    private string $prev_page_url;

    /**
     * @OA\Property(
     *     title="to",
     *     format="int64",
     *     type="integer",
     *     example=2,
     * )
     *
     * @var int $to
     */
    private int $to;

    /**
     * @OA\Property(
     *     title="total",
     *     format="int64",
     *     type="integer",
     *     example=45,
     * )
     *
     * @var int $total
     */
    private int $total;
}

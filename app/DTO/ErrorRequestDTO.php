<?php

namespace App\DTO;

/**
 * @OA\Schema(
 *     title="ErrorRequestDTO",
 *     description="Error",
 *     @OA\Xml(
 *          name="ErrorRequest"
 *     )
 * )
 */
class ErrorRequestDTO
{
    /**
     * @OA\Property(
     *     title="success",
     *     type="boolean",
     *     example=false,
     * )
     *
     * @var bool $success
     */
    private bool $success;

    /**
     * @OA\Property(
     *     title="message",
     *     description="Error description",
     * )
     *
     * @var string[] $message
     */
    private array $message;

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

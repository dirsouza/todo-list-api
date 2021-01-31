<?php

namespace App\DTO;

/**
 * @OA\Schema(
 *     title="ErrorResponseDTO",
 *     description="Error",
 *     @OA\Xml(
 *          name="ErrorResponse"
 *     )
 * )
 */
class ErrorResponseDTO
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
     *     description="Message of error",
     *     type="string",
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

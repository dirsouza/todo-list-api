<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version=L5_SWAGGER_INFO_VERSION,
 *     title=L5_SWAGGER_INFO_TITLE,
 *     description=L5_SWAGGER_INFO_DESCRIPTION,
 *
 *     @OA\Contact(
 *          email=L5_SWAGGER_INFO_CONTACT
 *     ),
 *
 *     @OA\License(
 *          name=L5_SWAGGER_INFO_LICENSE_NAME,
 *          url=L5_SWAGGER_INFO_LICENSE_URL
 *     )
 * )
 *
 * @OA\Host(
 *     url=L5_SWAGGER_SERVER_HOST
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_SERVER_HOST
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

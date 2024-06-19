<?php

namespace App\OpenApi;

use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *   @OA\Info(
 *     title="Crafted By API",
 *     version="1.0.0",
 *     description="All the routes for the Crafted By shop.",
 *     @OA\Contact(
 *       email="maxime@dysign.fr",
 *       name="Crafted By Team"
 *     )
 *   ),
 *   @OA\Server(
 *     description="API Server",
 *     url="http://0.0.0.0/api"
 *   ),
 *   @OA\Components(
 *      @OA\Schema(
 *         schema="Product",
 *         type="object",
 *         title="Product",
 *         properties={
 *          @OA\Property(property="id", type="string", format="uuid"),
 *          @OA\Property(property="name", type="string"),
 *          @OA\Property(property="description", type="string"),
 *          @OA\Property(property="price", type="number", format="float"),
 *          @OA\Property(property="created_at", type="string", format="date-time"),
 *          @OA\Property(property="updated_at", type="string", format="date-time"),
 *        }
 *     )
 *  )
 * )
 */
class OpenApiConfig
{
}
<?php

declare(strict_types=1);

namespace App\Module\Response\Infrastructure;

use App\Module\Response\Domain\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ResponseJsonFactory
{

    public function create(Response $response): JsonResponse
    {
        return new JsonResponse(
            $response->toArray()
        );
    }

}

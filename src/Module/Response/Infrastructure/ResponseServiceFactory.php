<?php

declare(strict_types=1);

namespace App\Module\Response\Infrastructure;

use App\Module\Response\Domain\ResponseService;

final class ResponseServiceFactory
{

    public function create(): ResponseService
    {
        $responseValidator = new ResponseValidator();

        return new ResponseService(
            $responseValidator,
        );
    }

}

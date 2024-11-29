<?php

declare(strict_types=1);

namespace App\Module\Response\Infrastructure;

use App\Module\Response\Domain\ResponseStatusEnum;
use App\Module\Response\Domain\ResponseValidatorInterface;

final class ResponseValidator implements ResponseValidatorInterface
{

    public function validateMessage(string $message, \Throwable $exception): void
    {
        if (empty($message)) {
            throw $exception;
        }
    }

    public function validateStatus(ResponseStatusEnum $status, \Throwable $exception): void
    {
        if (!in_array($status, ResponseStatusEnum::cases())) {
            throw $exception;
        }
    }

}

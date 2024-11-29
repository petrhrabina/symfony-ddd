<?php

declare(strict_types=1);

namespace App\Module\Response\Domain;

interface ResponseValidatorInterface
{

    public function validateMessage(
        string $message,
        \Throwable $exception
    ): void;

    public function validateStatus(
        ResponseStatusEnum $status,
        \Throwable $exception
    ): void;

}

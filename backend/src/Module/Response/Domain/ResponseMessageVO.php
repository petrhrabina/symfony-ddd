<?php

declare(strict_types=1);

namespace App\Module\Response\Domain;

final readonly class ResponseMessageVO
{

    private string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getValue(): string
    {
        return $this->message;
    }

}

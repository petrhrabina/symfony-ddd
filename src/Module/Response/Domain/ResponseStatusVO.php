<?php

declare(strict_types=1);

namespace App\Module\Response\Domain;

final readonly class ResponseStatusVO
{

    private ResponseStatusEnum $status;

    public function __construct(ResponseStatusEnum $status)
    {
        $this->status = $status;
    }

    public function getValue(): string
    {
        return $this->status->name;
    }

}

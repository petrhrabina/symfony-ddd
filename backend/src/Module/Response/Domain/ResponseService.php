<?php

declare(strict_types=1);

namespace App\Module\Response\Domain;

final class ResponseService
{

    private readonly ResponseValidatorInterface $responseValidator;

    public function __construct(
        ResponseValidatorInterface $responseValidator,
    ) {
        $this->responseValidator = $responseValidator;
    }

    public function json(
        string $message,
        ResponseStatusEnum $status
    ): Response {
        $this->responseValidator->validateMessage(
            $message,
            new ResponseInvalidMessageException(),
        );

        $this->responseValidator->validateStatus(
            $status,
            new ResponseInvalidStatusException(),
        );

        return new Response(
            new ResponseMessageVO($message),
            new ResponseStatusVO($status),
        );
    }

}

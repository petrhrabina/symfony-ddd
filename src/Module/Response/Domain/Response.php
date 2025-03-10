<?php

declare(strict_types=1);

namespace App\Module\Response\Domain;

final readonly class Response
{

    public ResponseMessageVO $message;
    public ResponseStatusVO $status;

    public function __construct(
        ResponseMessageVO $message,
        ResponseStatusVO $status,
    ) {
        $this->message = $message;
        $this->status = $status;
    }


    public function toArray(): array
    {
        return [
            'status' => $this->status->getValue(),
            'message' => $this->message->getValue(),
        ];
    }

}

<?php

declare(strict_types=1);

namespace App\Module\Response\Domain;

final class ResponseInvalidStatusException extends \Exception
{

    public function __construct()
    {
        parent::__construct("Invalid status.");
    }

}
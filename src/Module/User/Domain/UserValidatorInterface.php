<?php

declare(strict_types=1);

namespace App\Module\User\Domain;

interface UserValidatorInterface
{

    public function validate(User $user): void;

}

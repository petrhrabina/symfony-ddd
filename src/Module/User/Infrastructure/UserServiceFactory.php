<?php

declare(strict_types=1);

namespace App\Module\User\Infrastructure;

use App\Module\User\Domain\UserService;


class UserServiceFactory
{

    private readonly UserRepository $userRepository;
    private readonly UserValidator $userValidator;

    public function __construct(UserRepository $userRepository, UserValidator $userValidator)
    {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
    }

    public function create(): UserService
    {
        return new UserService(
            $this->userRepository,
            $this->userValidator
        );
    }

}

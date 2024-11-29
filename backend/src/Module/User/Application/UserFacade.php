<?php

declare(strict_types=1);

namespace App\Module\User\Application;

use App\Module\User\Domain\UserService;
use App\Module\User\Infrastructure\UserServiceFactory;

final readonly class UserFacade
{
    private readonly UserService $userService;

    public function __construct(
        UserServiceFactory $userServiceFactory,
    ) {
        $this->userService = $userServiceFactory->create();
    }

    public function findAllUsers(): array
    {
        return $this->userService->getAllUsers();
    }

}

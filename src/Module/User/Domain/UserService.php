<?php

declare(strict_types=1);

namespace App\Module\User\Domain;

final class UserService
{

    private readonly UserRepositoryInterface $userRepository;
    private readonly UserValidatorInterface $userValidator;

    public function __construct(
        UserRepositoryInterface $userRepository,
        UserValidatorInterface $userValidator
    ) {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
    }

    public function getAllUsers(): array
    {
        $result = [];

        $allUserEntities = $this->userRepository->findAll();

        /** @var User $user */
        foreach ($allUserEntities as $user) {
            $this->userValidator->validate($user);
            $result[] = $user->getFirstName() . " " . $user->getLastName();
        }

        return $result;
    }

}

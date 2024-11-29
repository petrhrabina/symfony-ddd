<?php

declare(strict_types=1);

namespace App\Module\User\Infrastructure;

use App\Module\User\Domain\User;
use App\Module\User\Domain\UserValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserValidator implements UserValidatorInterface
{

    private readonly ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(User $user): void
    {
        $constraints = new Assert\Collection([
            'firstName' => [
                new Assert\NotBlank([
                    'message' => 'First name cannot be empty',
                ]),
                new Assert\Length([
                    'min' => 2,
                    'max' => 50,
                    'minMessage' => 'First name must be at least {{ limit }} characters long',
                    'maxMessage' => 'First name cannot be longer than {{ limit }} characters',
                ]),
            ],
            'lastName' => [
                new Assert\NotBlank([
                    'message' => 'Last name cannot be empty',
                ]),
                new Assert\Length([
                    'min' => 3,
                    'max' => 50,
                    'minMessage' => 'Last name must be at least {{ limit }} characters long',
                    'maxMessage' => 'Last name cannot be longer than {{ limit }} characters',
                ]),
            ],
            'email' => [
                new Assert\NotBlank([
                    'message' => 'Email cannot be empty',
                ]),
                new Assert\Email([
                    'message' => 'Email {{ value }} is not a valid email address',
                ]),
                new Assert\Length([
                    'max' => 255,
                    'maxMessage' => 'Email cannot be longer than {{ limit }} characters',
                ]),
            ],
        ]);

        $dataToValidate = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
        ];

        $validate = $this->validator->validate($dataToValidate, $constraints);

        $report = function (ConstraintViolationListInterface $validate) {
            $messages = [];
            foreach ($validate as $violation) {
                $messages[] = $violation->getMessage();
            }
            return $messages;
        };

        assert(
            $validate->count() === 0,
            'User validation failed: ' . implode(', ', $report($validate))
        );
    }

}

<?php

declare(strict_types=1);

namespace App\Module\User\Domain;

class User
{

    private readonly int $id;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {

        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

}

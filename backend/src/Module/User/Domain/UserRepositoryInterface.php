<?php

declare(strict_types=1);

namespace App\Module\User\Domain;

interface UserRepositoryInterface
{

    public function create(User $user): void;

    public function update(User $user): void;

    public function delete(User $user): void;

    public function findAll(): array;

    public function findById(int $id): ?User;

}

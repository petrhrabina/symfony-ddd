<?php

declare(strict_types=1);

namespace DataFixtures;

use App\Module\User\Domain\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setFirstName("Name{$i}");
            $user->setLastName("Lastname{$i}");
            $user->setEmail("user{$i}@example.com");

            $manager->persist($user);
        }

        $manager->flush();
    }
}

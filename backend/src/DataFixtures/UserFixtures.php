<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/** @psalm-suppress PropertyNotSetInConstructor */
final class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordEncoderInterface $encoder)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('memerelax');
        $user->setPassword($this->encoder->encodePassword($user, 'memerelax'));

        $manager->persist($user);
        $manager->flush();
    }
}

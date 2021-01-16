<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Client;
use App\Entity\User;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;

use function assert;

abstract class FunctionalTestCase extends ApiTestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();

        $this->purgeDatabase();
    }

    protected function loadUser(string $username, string $password): void
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPassword(
            static::$container->get('security.password_encoder')->encodePassword($user, $password)
        );

        $manager = static::$container->get('doctrine')->getManager();
        $manager->persist($user);
        $manager->flush();
    }

    protected function authenticateUser(string $username, string $password): string
    {
        $response = $this->client->request('POST', '/api/token', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'username' => $username,
                'password' => $password,
            ],
        ]);

        // Assert
        $json = $response->toArray();
        static::assertResponseIsSuccessful();
        static::assertArrayHasKey('token', $json);

        return $json['token'];
    }

    protected function loadAndAuthenticateUser(string $username, string $password): string
    {
        $this->loadUser($username, $password);

        return $this->authenticateUser($username, $password);
    }

    private function purgeDatabase(): void
    {
        $entityManager = static::$container->get('doctrine.orm.entity_manager');
        assert($entityManager instanceof EntityManagerInterface);

        $purger = new ORMPurger($entityManager);
        $purger->purge();
    }
}

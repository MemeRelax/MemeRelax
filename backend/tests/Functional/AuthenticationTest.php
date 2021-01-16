<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Client;
use App\Entity\User;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;

final class AuthenticationTest extends ApiTestCase
{
    private Client $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = self::$container->get('doctrine.orm.entity_manager');
        $purger = new ORMPurger($entityManager);
        $purger->purge();
    }

    public function testLogin(): void
    {
        $user = new User();
        $user->setUsername('memerelax');
        $user->setPassword(
            self::$container->get('security.password_encoder')->encodePassword($user, '$3CR3T')
        );

        $manager = self::$container->get('doctrine')->getManager();
        $manager->persist($user);
        $manager->flush();

        // retrieve a token
        $response = $this->client->request('POST', '/api/token', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'username' => 'memerelax',
                'password' => '$3CR3T',
            ],
        ]);

        $json = $response->toArray();
        $this->assertResponseIsSuccessful();
        $this->assertArrayHasKey('token', $json);

        // test not authorized
        $this->client->request('GET', '/api/memes');
        $this->assertResponseStatusCodeSame(401);

        // test authorized
        $this->client->request('GET', '/api/memes', ['auth_bearer' => $json['token']]);
        $this->assertResponseIsSuccessful();
    }
}

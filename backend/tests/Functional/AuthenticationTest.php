<?php

declare(strict_types=1);

namespace App\Tests\Functional;

final class AuthenticationTest extends FunctionalTestCase
{
    public function testLogin(): void
    {
        // Arrange
        $this->loadUser('memerelax', 'memerelax');

        // Act
        $token = $this->authenticateUser('memerelax', 'memerelax');

        // Assert: Not Authorized
        $this->client->request('GET', '/api/memes');
        self::assertResponseStatusCodeSame(401);

        // Assert: Authorized
        $this->client->request('GET', '/api/memes', ['auth_bearer' => $token]);
        self::assertResponseIsSuccessful();
    }
}

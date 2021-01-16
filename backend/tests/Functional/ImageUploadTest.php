<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use PHPUnit\Framework\Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use function basename;
use function copy;
use function dirname;
use function is_dir;
use function md5;
use function mkdir;
use function sprintf;
use function sys_get_temp_dir;
use function uniqid;

final class ImageUploadTest extends FunctionalTestCase
{
    private const FIXTURE_PATH = __DIR__ . '/../fixtures/meme.jpg';

    /** @test */
    public function it_uploads_an_image(): void
    {
        // Arrange
        $token = $this->loadAndAuthenticateUser('memerelax', 'memerelax');

        // Act
        $uploadedFile = new UploadedFile($this->getUploadedImagePath(), 'meme.jpg', null, null, true);

        $response = $this->client->request('POST', '/api/images', [
            'extra' => ['files' => ['file' => $uploadedFile]],
            'auth_bearer' => $token,
        ]);

        // Assert
        $responseData = $response->toArray();
        Assert::assertArrayHasKey('contentUrl', $responseData);
    }

    private function getUploadedImagePath(): string
    {
        $temporaryImagePath = sprintf(
            '%s/uploads/%s-%s',
            sys_get_temp_dir(),
            md5(uniqid('', true)),
            basename(self::FIXTURE_PATH)
        );
        $temporaryDir = dirname($temporaryImagePath);

        if (!is_dir($temporaryDir)) {
            mkdir($temporaryDir);
        }

        copy(self::FIXTURE_PATH, $temporaryImagePath);

        return $temporaryImagePath;
    }
}

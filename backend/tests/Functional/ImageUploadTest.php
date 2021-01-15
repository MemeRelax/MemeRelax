<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use PHPUnit\Framework\Assert;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use function basename;
use function copy;
use function dirname;
use function is_dir;
use function json_decode;
use function md5;
use function mkdir;
use function sprintf;
use function sys_get_temp_dir;
use function uniqid;

use const JSON_THROW_ON_ERROR;

final class ImageUploadTest extends WebTestCase
{
    private const FIXTURE_PATH = __DIR__ . '/../fixtures/meme.jpg';

    /** @test */
    public function it_uploads_an_image(): void
    {
        // Arrange
        $client = self::createClient();

        // Act
        $uploadedFile = new UploadedFile($this->getUploadedImagePath(), 'meme.jpg', null, null, true);

        $client->request('POST', '/images', [], ['file' => $uploadedFile]);

        // Assert
        $response = $client->getResponse();
        Assert::assertTrue($response->isSuccessful());

        $responseData = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
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

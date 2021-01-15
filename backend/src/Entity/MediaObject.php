<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class MediaObject
{
    public ?string $contentUrl = null;

    private Uuid $id;

    private string $filePath;

    private string $blurhash;

    public function __construct(string $filePath, string $blurhash)
    {
        $this->id = Uuid::v4();
        $this->filePath = $filePath;
        $this->blurhash = $blurhash;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function getBlurhash(): string
    {
        return $this->blurhash;
    }
}

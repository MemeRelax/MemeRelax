<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class Image
{
    public ?string $contentUrl = null;

    private Uuid $id;

    public function __construct(
        private string $filePath,
        private string $blurhash,
        private ?string $scannedContent
    ) {
        $this->id = Uuid::v4();
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

    public function getScannedContent(): ?string
    {
        return $this->scannedContent;
    }
}

<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Image\Dimensions;
use App\Entity\Image\Size;
use App\Event\ImageUploaded;
use Symfony\Component\Uid\Uuid;

class Image implements EventsRecorder
{
    use RecordsEvents;

    public ?string $contentUrl = null;

    private Uuid $id;

    private \DateTimeImmutable $uploadedAt;

    private ?string $scannedContent = null;

    private ?string $blurhash = null;

    public function __construct(private string $filePath, private Dimensions $dimensions, private Size $size)
    {
        $this->id = Uuid::v4();
        $this->uploadedAt = new \DateTimeImmutable();

        $this->recordEvent(new ImageUploaded($this->id));
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function getDimensions(): Dimensions
    {
        return $this->dimensions;
    }

    public function getSize(): Size
    {
        return $this->size;
    }

    public function getUploadedAt(): \DateTimeImmutable
    {
        return $this->uploadedAt;
    }

    public function setBlurhash(string $blurhash): void
    {
        $this->blurhash = $blurhash;
    }

    public function getBlurhash(): ?string
    {
        return $this->blurhash;
    }

    public function setScannedContent(string $scannedContent): void
    {
        $this->scannedContent = $scannedContent;
    }

    public function getScannedContent(): ?string
    {
        return $this->scannedContent;
    }
}

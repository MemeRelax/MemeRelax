<?php

declare(strict_types=1);

namespace App\Entity;

use App\Event\ImageUploaded;
use Symfony\Component\Uid\Uuid;

class Image implements EventsRecorder
{
    use RecordsEvents;

    public ?string $contentUrl = null;

    private Uuid $id;

    private ?string $scannedContent = null;

    private ?string $blurhash = null;

    public function __construct(private string $filePath)
    {
        $this->id = Uuid::v4();

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

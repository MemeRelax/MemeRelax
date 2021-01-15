<?php

declare(strict_types=1);

namespace App\Entity;

use App\Controller\CreateMediaObjectAction;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

class MediaObject
{
    /**
     * @Groups({"media_object_read"})
     */
    public ?string $contentUrl = null;

    private Uuid $id;

    private string $filePath;

    /**
     * @Groups({"media_object_read"})
     */
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

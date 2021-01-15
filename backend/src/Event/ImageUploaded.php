<?php

declare(strict_types=1);

namespace App\Event;

use Symfony\Component\Uid\Uuid;

final class ImageUploaded
{
    public function __construct(private Uuid $imageId)
    {
    }

    public function getImageId(): Uuid
    {
        return $this->imageId;
    }
}

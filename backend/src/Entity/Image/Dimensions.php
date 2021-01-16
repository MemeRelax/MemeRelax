<?php

declare(strict_types=1);

namespace App\Entity\Image;

final class Dimensions
{
    public function __construct(
        private PixelSize $width,
        private PixelSize $height
    ) {

    }

    public function getWidth(): PixelSize
    {
        return $this->width;
    }

    public function getHeight(): PixelSize
    {
        return $this->height;
    }
}

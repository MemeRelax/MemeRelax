<?php

declare(strict_types=1);

namespace App\Entity\Image;

final class Dimensions
{
    public function __construct(
        private Pixel $width,
        private Pixel $height
    ) {

    }

    public function getWidth(): Pixel
    {
        return $this->width;
    }

    public function getHeight(): Pixel
    {
        return $this->height;
    }
}

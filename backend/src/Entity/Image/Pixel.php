<?php

declare(strict_types=1);

namespace App\Entity\Image;

use DomainException;

final class Pixel
{
    private int $size;

    public function __construct(int $size)
    {
        if ($size <= 0) {
            throw new DomainException('Size must be greater than 0.');
        }

        $this->size = $size;
    }

    public function asInt(): int
    {
        return $this->size;
    }
}

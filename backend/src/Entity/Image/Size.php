<?php

declare(strict_types=1);

namespace App\Entity\Image;

final class Size
{
    private const UNITS = ['B', 'KiB', 'MiB'];

    private int $bytes;

    private function __construct(int $bytes)
    {
        if ($bytes <= 0) {
            throw new \DomainException('Size must be greater than 0.');
        }

        $this->bytes = $bytes;
    }

    public static function fromBytes(int $bytes): self
    {
        return new self($bytes);
    }

    public function asInt(): int
    {
        return $this->bytes;
    }

    public function toString(): string
    {
        $size = $this->bytes;
        $unitKey = 0;
        while ($size > 1024 && isset(self::UNITS[$unitKey + 1])) {
            $size /= 1024;
            $unitKey++;
        }

        return round($size, 2) . ' ' . self::UNITS[$unitKey];
    }
}

<?php

declare(strict_types=1);

namespace App\Doctrine\Type;

use App\Entity\Image\PixelSize;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class PixelSizeType extends Type
{
    public const NAME = 'pixel_size';

    public function convertToPHPValue($value, AbstractPlatform $platform): PixelSize
    {
        assert(is_int($value));

        return new PixelSize($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): int
    {
        assert($value instanceof PixelSize);

        return $value->asInt();
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getSmallIntTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::NAME;
    }

}

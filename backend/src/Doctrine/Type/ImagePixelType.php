<?php

declare(strict_types=1);

namespace App\Doctrine\Type;

use App\Entity\Image\Pixel;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

use function assert;
use function is_int;

final class ImagePixelType extends Type
{
    public const NAME = 'image_pixel';

    public function convertToPHPValue($value, AbstractPlatform $platform): Pixel
    {
        assert(is_int($value));

        return new Pixel($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): int
    {
        assert($value instanceof Pixel);

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

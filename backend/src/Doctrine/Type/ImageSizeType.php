<?php

declare(strict_types=1);

namespace App\Doctrine\Type;

use App\Entity\Image\Size;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class ImageSizeType extends Type
{
    public const NAME = 'image_size';

    public function convertToPHPValue($value, AbstractPlatform $platform): Size
    {
        assert(is_int($value));

        return Size::fromBytes($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): int
    {
        assert($value instanceof Size);

        return $value->asInt();
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getIntegerTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::NAME;
    }

}

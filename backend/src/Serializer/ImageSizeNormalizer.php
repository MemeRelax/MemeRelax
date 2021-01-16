<?php

declare(strict_types=1);

namespace App\Serializer;

use App\Entity\Image;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use function assert;

final class ImageSizeNormalizer implements NormalizerInterface
{
    public function normalize($object, ?string $format = null, array $context = []): string
    {
        assert($object instanceof Image\Size);

        return $object->toString();
    }

    public function supportsNormalization($data, ?string $format = null): bool
    {
        return $data instanceof Image\Size;
    }
}

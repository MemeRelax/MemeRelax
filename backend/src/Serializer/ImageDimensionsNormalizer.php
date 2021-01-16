<?php

declare(strict_types=1);

namespace App\Serializer;

use App\Entity\Image;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use function assert;

final class ImageDimensionsNormalizer implements NormalizerInterface
{
    /**
     * @param mixed $object
     *
     * @return array{width: int, height: int}
     */
    public function normalize($object, ?string $format = null, array $context = []): array
    {
        assert($object instanceof Image\Dimensions);

        return [
            'width' => $object->getWidth()->asInt(),
            'height' => $object->getHeight()->asInt(),
        ];
    }

    /** @param mixed $data */
    public function supportsNormalization($data, ?string $format = null): bool
    {
        return $data instanceof Image\Dimensions;
    }
}

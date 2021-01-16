<?php

declare(strict_types=1);

namespace App\Serializer;

use App\Entity\Image;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class ImageDimensionsNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /**
     * @return array{width: int, height: int}
     */
    public function normalize($object, string $format = null, array $context = []): array
    {
        assert($object instanceof Image\Dimensions);

        return [
            'width' => $object->getWidth()->asInt(),
            'height' => $object->getHeight()->asInt(),
        ];
    }

    public function supportsNormalization($data, string $format = null): bool
    {
        return $data instanceof Image\Dimensions;
    }

    public function denormalize($data, string $type, string $format = null, array $context = []): Image\Dimensions
    {
        assert(isset($data['width'], $data['height']));

        return new Image\Dimensions(new Image\Pixel($data['width']), new Image\Pixel($data['height']));
    }

    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        return $type === Image\Dimensions::class;
    }
}

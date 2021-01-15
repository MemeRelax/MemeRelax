<?php

declare(strict_types=1);

namespace App\Blurhash;

use kornrunner\Blurhash\Blurhash;
use Symfony\Component\HttpFoundation\File\File;

use function imagecolorat;
use function imagecolorsforindex;
use function imagecreatefromstring;
use function imagesx;
use function imagesy;

final class KornrunnerBlurhashGenerator implements BlurhashGenerator
{
    public function __construct(private int $xAxisComponents, private int $yAxisComponents)
    {
    }

    public function generate(File $file): string
    {
        $image = imagecreatefromstring($file->getContent());
        $width = imagesx($image);
        $height = imagesy($image);

        $pixels = [];
        for ($y = 0; $y < $height; ++$y) {
            $row = [];
            for ($x = 0; $x < $width; ++$x) {
                $index = imagecolorat($image, $x, $y);
                $colors = imagecolorsforindex($image, $index);

                $row[] = [$colors['red'], $colors['green'], $colors['blue']];
            }

            $pixels[] = $row;
        }

        return Blurhash::encode($pixels, $this->xAxisComponents, $this->yAxisComponents);
    }
}

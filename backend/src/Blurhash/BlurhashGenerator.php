<?php

declare(strict_types=1);

namespace App\Blurhash;

use Symfony\Component\HttpFoundation\File\File;

interface BlurhashGenerator
{
    public function generate(File $file): string;
}

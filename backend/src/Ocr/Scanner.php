<?php

declare(strict_types=1);

namespace App\Ocr;

use Symfony\Component\HttpFoundation\File\File;

interface Scanner
{
    public function scan(File $file): string;
}

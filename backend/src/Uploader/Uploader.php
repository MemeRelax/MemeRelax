<?php

declare(strict_types=1);

namespace App\Uploader;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface Uploader
{
    public function upload(UploadedFile $uploadedFile): File;
}

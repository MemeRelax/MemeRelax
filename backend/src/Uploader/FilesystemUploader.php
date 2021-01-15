<?php

declare(strict_types=1);

namespace App\Uploader;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class FilesystemUploader implements Uploader
{
    public function __construct(private string $uploadDirectory)
    {
    }

    public function upload(UploadedFile $uploadedFile): File
    {
        return $uploadedFile->move($this->uploadDirectory, $uploadedFile->getClientOriginalName());
    }
}

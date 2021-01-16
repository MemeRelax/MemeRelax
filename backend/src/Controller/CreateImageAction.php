<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Image;
use App\Uploader\Uploader;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class CreateImageAction
{
    public function __construct(private Uploader $uploader)
    {
    }

    public function __invoke(Request $request): Image
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile instanceof UploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $file = $this->uploader->upload($uploadedFile);

        return new Image($file->getFilename(), $this->getDimensions($file));
    }

    private function getDimensions(File $file): Image\Dimensions
    {
        $image = imagecreatefromstring($file->getContent());
        $width = imagesx($image);
        $height = imagesy($image);

        return new Image\Dimensions(new Image\Pixel($width), new Image\Pixel($height));
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use App\Blurhash\BlurhashGenerator;
use App\Entity\Image;
use App\Ocr\Scanner;
use App\Uploader\Uploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class CreateImageAction
{
    public function __construct(
        private Uploader $uploader,
        private BlurhashGenerator $blurhashGenerator,
        private Scanner $scanner
    ) {
    }

    public function __invoke(Request $request): Image
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile instanceof UploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $file = $this->uploader->upload($uploadedFile);

        return new Image(
            $file->getFilename(),
            $this->blurhashGenerator->generate($file),
            $this->scanner->scan($file)
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use App\Blurhash\BlurhashGenerator;
use App\Entity\MediaObject;
use App\Uploader\Uploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class CreateMediaObjectAction
{
    public function __construct(private Uploader $uploader, private BlurhashGenerator $blurhashGenerator)
    {
    }

    public function __invoke(Request $request): MediaObject
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile instanceof UploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $file = $this->uploader->upload($uploadedFile);

        return new MediaObject(
            $file->getFilename(),
            $this->blurhashGenerator->generate($file)
        );
    }
}

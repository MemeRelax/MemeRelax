<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\MediaObject;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class CreateMediaObjectAction
{
    public function __invoke(Request $request): MediaObject
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile instanceof File) {
            throw new BadRequestHttpException('"file" is required');
        }

        return new MediaObject($uploadedFile);
    }
}

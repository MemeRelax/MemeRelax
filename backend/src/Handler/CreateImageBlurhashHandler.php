<?php

declare(strict_types=1);

namespace App\Handler;

use App\Blurhash\BlurhashGenerator;
use App\Event\ImageUploaded;
use App\Repository\ImageRepository;
use Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class CreateImageBlurhashHandler implements MessageHandlerInterface
{
    public function __construct(
        private ImageRepository $imageRepository,
        private BlurhashGenerator $blurhashGenerator,
        private string $uploadDirectory
    ) {
    }

    public function __invoke(ImageUploaded $event): void
    {
        $image = $this->imageRepository->find($event->getImageId());

        if ($image === null) {
            throw new Exception('wtf?');
        }

        $blurhash = $this->blurhashGenerator->generate(new File($this->uploadDirectory . '/' . $image->getFilePath()));

        $image->setBlurhash($blurhash);
    }
}

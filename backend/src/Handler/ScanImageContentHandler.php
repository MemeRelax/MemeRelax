<?php

declare(strict_types=1);

namespace App\Handler;

use App\Event\ImageUploaded;
use App\Ocr\Scanner;
use App\Repository\ImageRepository;
use Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ScanImageContentHandler implements MessageHandlerInterface
{
    public function __construct(
        private ImageRepository $imageRepository,
        private Scanner $scanner,
        private string $uploadDirectory
    ) {
    }

    public function __invoke(ImageUploaded $event): void
    {
        $image = $this->imageRepository->find($event->getImageId());

        if ($image === null) {
            throw new Exception('wtf?');
        }

        $scannedContent = $this->scanner->scan(new File($this->uploadDirectory . '/' . $image->getFilePath()));

        $image->setScannedContent($scannedContent);
    }
}

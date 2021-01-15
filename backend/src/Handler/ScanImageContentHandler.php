<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Image;
use App\Event\ImageUploaded;
use App\Ocr\Scanner;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

use function assert;

final class ScanImageContentHandler implements MessageHandlerInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private Scanner $scanner,
        private string $uploadDirectory
    ) {
    }

    public function __invoke(ImageUploaded $event): void
    {
        $repository = $this->entityManager->getRepository(Image::class);
        assert($repository instanceof EntityRepository);

        $image = $repository->find($event->getImageId());

        if ($image === null) {
            throw new Exception('wtf?');
        }

        $scannedContent = $this->scanner->scan(new File($this->uploadDirectory . '/' . $image->getFilePath()));

        $image->setScannedContent($scannedContent);

        $this->entityManager->persist($image);
        $this->entityManager->flush();
    }
}

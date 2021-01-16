<?php

declare(strict_types=1);

namespace App\Handler;

use App\Blurhash\BlurhashGenerator;
use App\Entity\Image;
use App\Event\ImageUploaded;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

use function assert;

final class CreateImageBlurhashHandler implements MessageHandlerInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private BlurhashGenerator $blurhashGenerator,
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

        $blurhash = $this->blurhashGenerator->generate(new File($this->uploadDirectory . '/' . $image->getFilePath()));

        $image->setBlurhash($blurhash);

        $this->entityManager->persist($image);
        $this->entityManager->flush();
    }
}

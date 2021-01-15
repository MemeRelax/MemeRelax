<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use ApiPlatform\Core\Util\RequestAttributesExtractor;
use App\Entity\Image;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

use function is_a;
use function is_iterable;

final class ResolveImageContentUrlSubscriber implements EventSubscriberInterface
{
    /**
     * @psalm-return array<string, array{string, int}>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => ['onPreSerialize', EventPriorities::PRE_SERIALIZE],
        ];
    }

    public function onPreSerialize(ViewEvent $event): void
    {
        /** @var object|object[] $controllerResult */
        $controllerResult = $event->getControllerResult();

        if ($controllerResult instanceof Response) {
            return;
        }

        $request = $event->getRequest();

        if (!$request->attributes->getBoolean('_api_respond', true)) {
            return;
        }

        $attributes = RequestAttributesExtractor::extractAttributes($request);
        if (!$attributes || !is_a($attributes['resource_class'], Image::class, true)) {
            return;
        }

        $images = $controllerResult;

        if (!is_iterable($images)) {
            $images = [$images];
        }

        foreach ($images as $image) {
            if (!$image instanceof Image) {
                continue;
            }

            $image->contentUrl = '/media/' . $image->getFilePath();
        }
    }
}

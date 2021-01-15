<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\EventsRecorder;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\Messenger\MessageBusInterface;

final class DispatchRecordedEventsSubscriber implements EventSubscriber
{
    public function __construct(private MessageBusInterface $eventBus)
    {
    }

    /** @return string[] */
    public function getSubscribedEvents(): array
    {
        return [
            Events::postPersist,
            Events::postUpdate,
            Events::postRemove,
        ];
    }

    public function postPersist(LifecycleEventArgs $event): void
    {
        $this->handle($event);
    }

    public function postUpdate(LifecycleEventArgs $event): void
    {
        $this->handle($event);
    }

    public function postRemove(LifecycleEventArgs $event): void
    {
        $this->handle($event);
    }

    private function handle(LifecycleEventArgs $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof EventsRecorder) {
            return;
        }

        $recordedEvents = $object->popRecordedEvents();

        foreach ($recordedEvents as $recordedEvent) {
            $this->eventBus->dispatch($recordedEvent);
        }
    }
}

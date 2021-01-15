<?php

declare(strict_types=1);

namespace App\Entity;

trait RecordsEvents
{
    /** @var object[] */
    private array $events = [];

    /** @return object[] */
    public function popRecordedEvents(): array
    {
        $events = $this->events;

        $this->events = [];

        return $events;
    }

    private function recordEvent(object $event): void
    {
        $this->events[] = $event;
    }
}

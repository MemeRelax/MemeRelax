<?php

declare(strict_types=1);

namespace App\Entity;

interface EventsRecorder
{
    /** @return object[] */
    public function popRecordedEvents(): array;
}

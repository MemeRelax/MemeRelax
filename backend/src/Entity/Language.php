<?php

declare(strict_types=1);

namespace App\Entity;

/** @psalm-suppress MissingConstructor */
class Language
{
    public ?int $id;

    public ?string $name;

    public ?string $emoji;
}

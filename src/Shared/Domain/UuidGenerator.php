<?php

declare(strict_types = 1);

namespace Garciasdos\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}

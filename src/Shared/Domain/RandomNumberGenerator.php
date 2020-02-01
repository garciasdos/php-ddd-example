<?php

declare(strict_types = 1);

namespace Garciasdos\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}

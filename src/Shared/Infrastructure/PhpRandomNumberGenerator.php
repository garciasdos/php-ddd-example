<?php

declare(strict_types = 1);

namespace Garciasdos\Shared\Infrastructure;

use Garciasdos\Shared\Domain\RandomNumberGenerator;

use function random_int;

final class PhpRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return random_int(1, 5);
    }
}

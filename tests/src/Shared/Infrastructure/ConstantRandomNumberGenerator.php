<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Infrastructure;

use Garciasdos\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}

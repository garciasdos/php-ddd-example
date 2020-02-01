<?php

declare(strict_types = 1);

namespace Garciasdos\Shared\Infrastructure;

use Garciasdos\Shared\Domain\UuidGenerator;
use Ramsey\Uuid\Uuid;

final class RamseyUuidGenerator implements UuidGenerator
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}

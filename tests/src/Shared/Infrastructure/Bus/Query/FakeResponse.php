<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Infrastructure\Bus\Query;

use Garciasdos\Shared\Domain\Bus\Query\Response;

final class FakeResponse implements Response
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function number(): int
    {
        return $this->number;
    }
}

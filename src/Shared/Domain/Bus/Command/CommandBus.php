<?php

declare(strict_types = 1);

namespace Garciasdos\Shared\Domain\Bus\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}

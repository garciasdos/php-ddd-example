<?php

declare(strict_types = 1);

namespace Garciasdos\Shared\Infrastructure\Bus\Command;

use Garciasdos\Shared\Domain\Bus\Command\Command;
use RuntimeException;

final class CommandNotRegisteredError extends RuntimeException
{
    public function __construct(Command $command)
    {
        $commandClass = get_class($command);

        parent::__construct("The command <$commandClass> hasn't a command handler associated");
    }
}


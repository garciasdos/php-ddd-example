<?php

declare(strict_types = 1);

namespace Garciasdos\Shared\Infrastructure\Bus\Command;

use Garciasdos\Shared\Domain\Bus\Command\Command;
use Garciasdos\Shared\Domain\Bus\Command\CommandBus;
use Garciasdos\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

final class InMemorySymfonyCommandBus implements CommandBus
{
    private $bus;

    public function __construct(iterable $commandHandlers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(CallableFirstParameterExtractor::forCallables($commandHandlers))
                ),
            ]
        );
    }

    public function dispatch(Command $command): void
    {
        try {
            $this->bus->dispatch($command);
        } catch (NoHandlerForMessageException $unused) {
            throw new CommandNotRegisteredError($command);
        } catch (HandlerFailedException $error) {
            throw $error->getPrevious();
        }
    }
}

<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Infrastructure\Bus\Event\RabbitMq;

use Garciasdos\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use Garciasdos\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class TestAllWorksOnRabbitMqEventsPublished implements DomainEventSubscriber
{
    public static function subscribedTo(): array
    {
        return [
            CourseCreatedDomainEvent::class,
            CoursesCounterIncrementedDomainEvent::class,
        ];
    }

    /** @param CourseCreatedDomainEvent|CoursesCounterIncrementedDomainEvent $event */
    public function __invoke($event)
    {
    }
}

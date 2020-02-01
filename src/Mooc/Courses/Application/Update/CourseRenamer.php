<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\Courses\Application\Update;

use Garciasdos\Mooc\Courses\Application\Find\CourseFinder;
use Garciasdos\Mooc\Courses\Domain\CourseName;
use Garciasdos\Mooc\Courses\Domain\CourseRepository;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;
use Garciasdos\Shared\Domain\Bus\Event\EventBus;

final class CourseRenamer
{
    private $repository;
    private $finder;
    private $bus;

    public function __construct(CourseRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->finder     = new CourseFinder($repository);
        $this->bus        = $bus;
    }

    public function __invoke(CourseId $id, CourseName $newName): void
    {
        $course = $this->finder->__invoke($id);

        $course->rename($newName);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}

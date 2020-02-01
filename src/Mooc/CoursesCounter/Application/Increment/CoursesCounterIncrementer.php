<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\CoursesCounter\Application\Increment;

use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounter;
use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterRepository;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;
use Garciasdos\Shared\Domain\Bus\Event\EventBus;
use Garciasdos\Shared\Domain\UuidGenerator;

final class CoursesCounterIncrementer
{
    private $repository;
    private $uuidGenerator;
    private $bus;

    public function __construct(
        CoursesCounterRepository $repository,
        UuidGenerator $uuidGenerator
    ) {
        $this->repository    = $repository;
        $this->uuidGenerator = $uuidGenerator;
    }

    public function __invoke(CourseId $courseId)
    {
        $counter = $this->repository->search() ?: $this->initializeCounter();

        if (!$counter->hasIncremented($courseId)) {
            $counter->increment($courseId);

            $this->repository->save($counter);
        }
    }

    private function initializeCounter(): CoursesCounter
    {
        return CoursesCounter::initialize(new CoursesCounterId($this->uuidGenerator->generate()));
    }
}

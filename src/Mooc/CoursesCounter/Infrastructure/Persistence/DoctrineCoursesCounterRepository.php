<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\CoursesCounter\Infrastructure\Persistence;

use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounter;
use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterRepository;
use Garciasdos\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCoursesCounterRepository extends DoctrineRepository implements CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void
    {
        $this->persist($counter);
    }

    public function search(): ?CoursesCounter
    {
        return $this->repository(CoursesCounter::class)->findOneBy([]);
    }
}

<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\Courses\Infrastructure\Persistence;

use Garciasdos\Mooc\Courses\Domain\Course;
use Garciasdos\Mooc\Courses\Domain\CourseRepository;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;
use Garciasdos\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}

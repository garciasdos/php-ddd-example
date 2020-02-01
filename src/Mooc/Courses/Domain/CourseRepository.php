<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\Courses\Domain;

use Garciasdos\Mooc\Shared\Domain\Course\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}

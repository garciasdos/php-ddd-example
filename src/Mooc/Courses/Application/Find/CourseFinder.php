<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\Courses\Application\Find;

use Garciasdos\Mooc\Courses\Domain\Course;
use Garciasdos\Mooc\Courses\Domain\CourseNotExist;
use Garciasdos\Mooc\Courses\Domain\CourseRepository;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;

final class CourseFinder
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CourseId $id): Course
    {
        $course = $this->repository->search($id);

        if (null === $course) {
            throw new CourseNotExist($id);
        }

        return $course;
    }
}

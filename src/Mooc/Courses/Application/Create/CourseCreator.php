<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\Courses\Application\Create;

use Garciasdos\Mooc\Courses\Domain\Course;
use Garciasdos\Mooc\Courses\Domain\CourseDuration;
use Garciasdos\Mooc\Courses\Domain\CourseName;
use Garciasdos\Mooc\Courses\Domain\CourseRepository;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;

final class CourseCreator
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CourseId $id, CourseName $name, CourseDuration $duration)
    {
        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
    }
}

<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\Courses\Domain;

use Garciasdos\Mooc\Courses\Application\Create\CreateCourseCommand;
use Garciasdos\Mooc\Courses\Domain\Course;
use Garciasdos\Mooc\Courses\Domain\CourseDuration;
use Garciasdos\Mooc\Courses\Domain\CourseName;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;

final class CourseMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): Course
    {
        return new Course($id, $name, $duration);
    }

    public static function fromRequest(CreateCourseCommand $request): Course
    {
        return self::create(
            CourseIdMother::create($request->id()),
            CourseNameMother::create($request->name()),
            CourseDurationMother::create($request->duration())
        );
    }

    public static function random(): Course
    {
        return self::create(CourseIdMother::random(), CourseNameMother::random(), CourseDurationMother::random());
    }
}

<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\Courses\Application\Create;

use Garciasdos\Mooc\Courses\Application\Create\CreateCourseCommand;
use Garciasdos\Mooc\Courses\Domain\CourseDuration;
use Garciasdos\Mooc\Courses\Domain\CourseName;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseDurationMother;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseIdMother;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseNameMother;

final class CreateCourseCommandMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): CreateCourseCommand
    {
        return new CreateCourseCommand($id->value(), $name->value(), $duration->value());
    }

    public static function random(): CreateCourseCommand
    {
        return self::create(CourseIdMother::random(), CourseNameMother::random(), CourseDurationMother::random());
    }
}

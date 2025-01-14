<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Backoffice\Courses\Domain;

use Garciasdos\Backoffice\Courses\Domain\BackofficeCourse;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseDurationMother;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseIdMother;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseNameMother;

final class BackofficeCourseMother
{
    public static function create(string $id, string $name, string $duration): BackofficeCourse
    {
        return new BackofficeCourse($id, $name, $duration);
    }

    public static function withName(string $name)
    {
        return self::create(
            CourseIdMother::random()->value(),
            $name,
            CourseDurationMother::random()->value()
        );
    }

    public static function random(): BackofficeCourse
    {
        return self::create(
            CourseIdMother::random()->value(),
            CourseNameMother::random()->value(),
            CourseDurationMother::random()->value()
        );
    }
}

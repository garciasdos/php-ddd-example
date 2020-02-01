<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\CoursesCounter\Domain;

use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounter;
use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterTotal;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseIdMother;
use Garciasdos\Tests\Shared\Domain\Repeater;

final class CoursesCounterMother
{
    public static function create(
        CoursesCounterId $id,
        CoursesCounterTotal $total,
        CourseId ...$existingCourses
    ): CoursesCounter {
        return new CoursesCounter($id, $total, ...$existingCourses);
    }

    public static function withOne(CourseId $courseId): CoursesCounter
    {
        return self::create(CoursesCounterIdMother::random(), CoursesCounterTotalMother::one(), $courseId);
    }

    public static function incrementing(CoursesCounter $existingCounter, CourseId $courseId): CoursesCounter
    {
        return self::create(
            $existingCounter->id(),
            CoursesCounterTotalMother::create($existingCounter->total()->value() + 1),
            ...array_merge($existingCounter->existingCourses(), [$courseId])
        );
    }

    public static function random(): CoursesCounter
    {
        return self::create(
            CoursesCounterIdMother::random(),
            CoursesCounterTotalMother::random(),
            ...Repeater::random(CourseIdMother::creator())
        );
    }
}

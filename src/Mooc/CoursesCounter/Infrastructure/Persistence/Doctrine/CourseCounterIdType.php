<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\CoursesCounter\Infrastructure\Persistence\Doctrine;

use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Garciasdos\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseCounterIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'course_counter_id';
    }

    protected function typeClassName(): string
    {
        return CoursesCounterId::class;
    }
}

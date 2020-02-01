<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\CoursesCounter\Domain;

use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Garciasdos\Tests\Shared\Domain\UuidMother;

final class CoursesCounterIdMother
{
    public static function create(string $value): CoursesCounterId
    {
        return new CoursesCounterId($value);
    }

    public static function random(): CoursesCounterId
    {
        return self::create(UuidMother::random());
    }
}

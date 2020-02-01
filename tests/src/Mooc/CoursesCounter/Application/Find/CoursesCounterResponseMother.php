<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\CoursesCounter\Application\Find;

use Garciasdos\Mooc\CoursesCounter\Application\Find\CoursesCounterResponse;
use Garciasdos\Mooc\CoursesCounter\Domain\CoursesCounterTotal;
use Garciasdos\Tests\Mooc\CoursesCounter\Domain\CoursesCounterTotalMother;

final class CoursesCounterResponseMother
{
    public static function create(CoursesCounterTotal $total): CoursesCounterResponse
    {
        return new CoursesCounterResponse($total->value());
    }

    public static function random(): CoursesCounterResponse
    {
        return self::create(CoursesCounterTotalMother::random());
    }
}

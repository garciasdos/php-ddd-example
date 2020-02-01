<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Domain\Criteria;

use Garciasdos\Shared\Domain\Criteria\FilterValue;
use Garciasdos\Tests\Shared\Domain\WordMother;

final class FilterValueMother
{
    public static function create($value): FilterValue
    {
        return new FilterValue($value);
    }

    public static function random(): FilterValue
    {
        return self::create(WordMother::random());
    }
}

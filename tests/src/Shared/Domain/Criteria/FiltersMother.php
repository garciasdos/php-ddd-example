<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Domain\Criteria;

use Garciasdos\Shared\Domain\Criteria\Filter;
use Garciasdos\Shared\Domain\Criteria\Filters;

final class FiltersMother
{
    /** @param Filter[] $filters */
    public static function create(array $filters): Filters
    {
        return new Filters($filters);
    }

    public static function createOne(Filter $filter): Filters
    {
        return self::create([$filter]);
    }

    public static function blank(): Filters
    {
        return self::create([]);
    }

    public static function random(): Filters
    {
        return self::create([FilterMother::random()]);
    }
}

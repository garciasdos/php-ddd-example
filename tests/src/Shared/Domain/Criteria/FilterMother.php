<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Domain\Criteria;

use Garciasdos\Shared\Domain\Criteria\Filter;
use Garciasdos\Shared\Domain\Criteria\FilterField;
use Garciasdos\Shared\Domain\Criteria\FilterOperator;
use Garciasdos\Shared\Domain\Criteria\FilterValue;

final class FilterMother
{
    public static function create(FilterField $field, FilterOperator $operator, FilterValue $value): Filter
    {
        return new Filter($field, $operator, $value);
    }

    public static function fromValues($values): Filter
    {
        return Filter::fromValues($values);
    }

    public static function random(): Filter
    {
        return self::create(FilterFieldMother::random(), FilterOperator::random(), FilterValueMother::random());
    }
}

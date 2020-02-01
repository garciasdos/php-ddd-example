<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Backoffice\Courses\Domain;

use Garciasdos\Shared\Domain\Criteria\Criteria;
use Garciasdos\Tests\Shared\Domain\Criteria\CriteriaMother;
use Garciasdos\Tests\Shared\Domain\Criteria\FilterMother;
use Garciasdos\Tests\Shared\Domain\Criteria\FiltersMother;
use Garciasdos\Tests\Shared\Domain\Criteria\OrderMother;

final class BackofficeCourseCriteriaMother
{
    public static function nameContains(string $text): Criteria
    {
        return CriteriaMother::create(
            FiltersMother::createOne(
                FilterMother::fromValues(
                    [
                        'field'    => 'name',
                        'operator' => 'CONTAINS',
                        'value'    => $text,
                    ]
                )
            )
        );
    }
}

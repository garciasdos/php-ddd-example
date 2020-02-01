<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Domain;

use Garciasdos\Tests\Shared\Domain\MotherCreator;

final class RandomElementPicker
{
    public static function from(...$elements)
    {
        return MotherCreator::random()->randomElement($elements);
    }
}

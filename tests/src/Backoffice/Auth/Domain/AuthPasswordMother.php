<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Backoffice\Auth\Domain;

use Garciasdos\Backoffice\Auth\Domain\AuthPassword;
use Garciasdos\Tests\Shared\Domain\UuidMother;

final class AuthPasswordMother
{
    public static function create(string $value): AuthPassword
    {
        return new AuthPassword($value);
    }

    public static function random(): AuthPassword
    {
        return self::create(UuidMother::random());
    }
}

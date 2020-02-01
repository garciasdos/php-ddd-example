<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Backoffice\Auth\Application\Authenticate;

use Garciasdos\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommand;
use Garciasdos\Backoffice\Auth\Domain\AuthPassword;
use Garciasdos\Backoffice\Auth\Domain\AuthUsername;
use Garciasdos\Tests\Backoffice\Auth\Domain\AuthPasswordMother;
use Garciasdos\Tests\Backoffice\Auth\Domain\AuthUsernameMother;

final class AuthenticateUserCommandMother
{
    public static function create(AuthUsername $username, AuthPassword $password): AuthenticateUserCommand
    {
        return new AuthenticateUserCommand($username->value(), $password->value());
    }

    public static function random(): AuthenticateUserCommand
    {
        return self::create(AuthUsernameMother::random(), AuthPasswordMother::random());
    }
}

<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\Shared\Infrastructure\PhpUnit;

use Garciasdos\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use Garciasdos\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class MoocEnvironmentArranger implements EnvironmentArranger
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function arrange(): void
    {
        apply(new DatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}

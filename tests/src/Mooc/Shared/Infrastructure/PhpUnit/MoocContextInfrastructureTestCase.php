<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\Shared\Infrastructure\PhpUnit;

use Garciasdos\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class MoocContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new MoocEnvironmentArranger($this->service(EntityManager::class));

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new MoocEnvironmentArranger($this->service(EntityManager::class));

        $arranger->close();

        parent::tearDown();
    }

    protected function clearUnitOfWork()
    {
        $this->service(EntityManager::class)->clear();
    }
}

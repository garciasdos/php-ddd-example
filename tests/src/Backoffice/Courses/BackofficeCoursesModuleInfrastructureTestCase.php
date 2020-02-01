<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Backoffice\Courses;

use Garciasdos\Backoffice\Courses\Infrastructure\Persistence\MySqlBackofficeCourseRepository;
use Garciasdos\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class BackofficeCoursesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): MySqlBackofficeCourseRepository
    {
        return new MySqlBackofficeCourseRepository($this->service(EntityManager::class));
    }
}

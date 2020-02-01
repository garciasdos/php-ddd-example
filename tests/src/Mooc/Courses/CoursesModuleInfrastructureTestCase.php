<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\Courses;

use Garciasdos\Mooc\Courses\Domain\CourseRepository;
use Garciasdos\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}

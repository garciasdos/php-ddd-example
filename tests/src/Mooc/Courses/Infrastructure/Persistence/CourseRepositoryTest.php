<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\Courses\Infrastructure\Persistence;

use Garciasdos\Tests\Mooc\Courses\CoursesModuleInfrastructureTestCase;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseIdMother;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseMother;

final class CourseRepositoryTest extends CoursesModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_course(): void
    {
        $course = CourseMother::random();

        $this->repository()->save($course);
    }

    /** @test */
    public function it_should_return_an_existing_course(): void
    {
        $course = CourseMother::random();

        $this->repository()->save($course);

        $this->assertEquals($course, $this->repository()->search($course->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_course(): void
    {
        $this->assertNull($this->repository()->search(CourseIdMother::random()));
    }
}

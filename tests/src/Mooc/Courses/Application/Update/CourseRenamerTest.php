<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Mooc\Courses\Application\Update;

use Garciasdos\Mooc\Courses\Application\Update\CourseRenamer;
use Garciasdos\Mooc\Courses\Domain\CourseNotExist;
use Garciasdos\Tests\Mooc\Courses\CoursesModuleUnitTestCase;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseIdMother;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseMother;
use Garciasdos\Tests\Mooc\Courses\Domain\CourseNameMother;
use Garciasdos\Tests\Shared\Domain\DuplicatorMother;

final class CourseRenamerTest extends CoursesModuleUnitTestCase
{
    private $renamer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->renamer = new CourseRenamer($this->repository(), $this->eventBus());
    }

    /** @test */
    public function it_should_rename_an_existing_course(): void
    {
        $course        = CourseMother::random();
        $newName       = CourseNameMother::random();
        $renamedCourse = DuplicatorMother::with($course, ['name' => $newName]);

        $this->shouldSearch($course->id(), $course);
        $this->shouldSave($renamedCourse);
        $this->shouldNotPublishDomainEvent();

        $this->renamer->__invoke($course->id(), $newName);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_course_not_exist(): void
    {
        $this->expectException(CourseNotExist::class);

        $id = CourseIdMother::random();

        $this->shouldSearch($id, null);

        $this->renamer->__invoke($id, CourseNameMother::random());
    }
}

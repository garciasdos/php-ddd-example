<?php

declare(strict_types = 1);

namespace Garciasdos\Mooc\Courses\Application\Create;

use Garciasdos\Mooc\Courses\Domain\CourseDuration;
use Garciasdos\Mooc\Courses\Domain\CourseName;
use Garciasdos\Mooc\Shared\Domain\Course\CourseId;
use Garciasdos\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCourseCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(CourseCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateCourseCommand $command)
    {
        $id       = new CourseId($command->id());
        $name     = new CourseName($command->name());
        $duration = new CourseDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}

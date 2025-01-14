<?php

declare(strict_types = 1);

namespace Garciasdos\Apps\Mooc\Backend\Controller\Courses;

use Garciasdos\Mooc\Courses\Application\Create\CreateCourseCommand;
use Garciasdos\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController
{
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(string $id, Request $request)
    {
        $this->bus->dispatch(
            new CreateCourseCommand(
                $id,
                $request->request->get('name'),
                $request->request->get('duration')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}

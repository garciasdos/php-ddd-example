<?php

declare(strict_types = 1);

namespace Garciasdos\Tests\Shared\Infrastructure\PhpUnit\Comparator;

use Garciasdos\Shared\Domain\Aggregate\AggregateRoot;
use Garciasdos\Tests\Shared\Domain\TestUtils;
use ReflectionObject;
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Comparator\ComparisonFailure;

final class AggregateRootSimilarComparator extends Comparator
{
    public function accepts($expected, $actual): bool
    {
        $aggregateRootClass = AggregateRoot::class;

        return $expected instanceof $aggregateRootClass && $actual instanceof $aggregateRootClass;
    }

    /**
     * @param AggregateRoot $expected
     * @param AggregateRoot $actual
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false): void
    {
        $actualEntity = clone $actual;
        $actualEntity->pullDomainEvents();

        if (!$this->aggregateRootsAreSimilar($expected, $actualEntity)) {
            throw new ComparisonFailure(
                $expected,
                $actual,
                $this->exporter->export($expected),
                $this->exporter->export($actual),
                false,
                'Failed asserting the aggregate roots are equal.'
            );
        }
    }

    private function aggregateRootsAreSimilar(AggregateRoot $expected, AggregateRoot $actual): bool
    {
        if (!$this->aggregateRootsAreTheSameClass($expected, $actual)) {
            return false;
        }

        return $this->aggregateRootPropertiesAreSimilar($expected, $actual);
    }

    private function aggregateRootsAreTheSameClass(AggregateRoot $expected, AggregateRoot $actual): bool
    {
        return get_class($expected) === get_class($actual);
    }

    private function aggregateRootPropertiesAreSimilar(AggregateRoot $expected, AggregateRoot $actual): bool
    {
        $expectedReflected = new ReflectionObject($expected);
        $actualReflected   = new ReflectionObject($actual);

        foreach ($expectedReflected->getProperties() as $expectedReflectedProperty) {
            $actualReflectedProperty = $actualReflected->getProperty($expectedReflectedProperty->getName());

            $expectedReflectedProperty->setAccessible(true);
            $actualReflectedProperty->setAccessible(true);

            $expectedProperty = $expectedReflectedProperty->getValue($expected);
            $actualProperty   = $actualReflectedProperty->getValue($actual);

            if (!TestUtils::isSimilar($expectedProperty, $actualProperty)) {
                return false;
            }
        }

        return true;
    }
}

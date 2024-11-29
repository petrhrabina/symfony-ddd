<?php

declare(strict_types=1);

namespace Dev;

use Ramsey\Collection\Collection as RamseyCollection;

/**
 * @template T
 * @extends RamseyCollection<T>
 */
final class Collection extends RamseyCollection
{
    /**
     * @param class-string<T> $type
     */
    public function __construct(private readonly string $type = "string")
    {
        parent::__construct($type);
    }

    /**
     * @return class-string<T>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param callable(T): void $callback
     */
    public function each(callable $callback): void
    {
        foreach ($this->getIterator() as $item) {
            $callback($item);
        }
    }
}

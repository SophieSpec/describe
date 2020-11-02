<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Event;

interface EventRegistryInterface
{
    /**
     * Retrieve the singleton instance.
     */
    public static function instance (): self;

    /**
     * Retrieve an event.
     */
    public function __get (string $name): EventInterface;
}

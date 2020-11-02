<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Event;

final class EventRegistry implements EventRegistryInterface
{
    private static self $instance;

    private array $events;

    /**
     * Constructor (private)
     */
    private function __construct()
    {
        $this->events = [
            'describe'   => new Event,
            'it'         => new Event,
            'when'       => new Event,
            'with'       => new Event,
            'assert'     => new Event,
            'success'    => new Event,
            'failed'     => new Event,
            'incomplete' => new Event,
        ];
    }

    /**
     * Retrieve the singleton instance.
     */
    public static function instance (): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Retrieve an event.
     */
    public function __get (string $name): EventInterface
    {
        if (!isset($this->events[$name])) {
            throw new EventNotFoundException(
                "'$name' event has not been found"
            );
        }
        return $this->events[$name];
    }
}

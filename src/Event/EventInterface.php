<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Event;

use SophieSpec\Describe\Runnable\RunnableInterface;

interface EventInterface
{
    /**
     * Subscribe a new listener.
     */
    public function subscribe(RunnableInterface $listener): void;

    /**
     * Dispatch the event with the initial callback.
     */
    public function dispatch(RunnableInterface $callback): void;
}

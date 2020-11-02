<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Event;

use Pure\Collection\SortedCollectionInterface;
use SophieSpec\Describe\Runnable\RunnableInterface;
use SophieSpec\Describe\Runnable\Runnable;
use SophieSpec\Describe\Runnable\RunnableCollection;
use SophieSpec\Describe\Runnable\ReversedRunnableCollection;

final class Event implements EventInterface
{
    private SortedCollectionInterface $listeners;

    /**
     * Constructor
     */
    public function __construct ()
    {
        $this->listeners = new ReversedRunnableCollection(
            new RunnableCollection
        );
    }

    /**
     * Subscribe a new listener.
     */
    public function subscribe (RunnableInterface $listener): void
    {
        $this->listeners = $this->listeners->with($listener);
    }

    /**
     * Dispatch the event with the initial callback as last listener.
     */
    public function dispatch (RunnableInterface $callback): void
    {
        $next = $callback;
        // We want to create an onion structure to ease the use
        // and wrapping of events and listeners. Each layer will
        // call explicitly the next layer by itself.
        foreach ($this->listeners->iterate() as $listener) {
            $next = new Runnable(fn() => $listener->run($next));
        }
        // Initiate the call to the upper listener.
        $next->run();
    }
}

<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Runnable;

final class Runnable implements RunnableInterface
{
    private $callback;

    /**
     * Constructor.
     */
    public function __construct (callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Run the callback.
     */
    public function run (): void
    {
        call_user_func($this->callback);
    }
}

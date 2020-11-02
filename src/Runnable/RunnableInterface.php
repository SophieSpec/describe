<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Runnable;

interface RunnableInterface
{
    /**
     * Run the callback.
     */
    public function run (): void;
}

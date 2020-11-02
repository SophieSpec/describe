<?php

declare(strict_types=1);

namespace SophieSpec\Describe;

use SophieSpec\Describe\Message\Message;
use SophieSpec\Describe\Runnable\Runnable;

/**
 * Display a message beginning by 'with' and run the callback
 */
function with (string $message, callable $callback): void
{
    (new Message("with $message"))->print();
    (new Runnable($callback))->run();
}

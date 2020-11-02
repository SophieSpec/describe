<?php

declare(strict_types=1);

namespace SophieSpec\Describe;

use SophieSpec\Describe\Message\Message;
use SophieSpec\Describe\Runnable\Runnable;

/**
 * Display a message beginning by 'it' and run the callback
 */
function it (string $message, callable $callback): void
{
    (new Message("it $message"))->print();
    (new Runnable($callback))->run();
}

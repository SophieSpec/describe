<?php

declare(strict_types=1);

namespace SophieSpec\Describe;

use SophieSpec\Describe\Message\Message;
use SophieSpec\Describe\Runnable\Runnable;

/**
 * Display a message beginning by 'describe' and run the callback
 */
function describe (string $message, callable $callback): void
{
    (new Message("describe $message"))->print();
    (new Runnable($callback))->run();
}

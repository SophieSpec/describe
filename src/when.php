<?php

declare(strict_types=1);

namespace SophieSpec\Describe;

use SophieSpec\Describe\Message\Message;
use SophieSpec\Describe\Runnable\Runnable;

/**
 * Display a message beginning by 'when' and run the callback
 */
function when (string $message, callable $callback): void
{
    (new Message("when $message"))->print();
    (new Runnable($callback))->run();
}

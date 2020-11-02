<?php

declare(strict_types=1);

use SophieSpec\Describe\Event\Event;
use SophieSpec\Describe\Runnable\Runnable;

###########################################################################
# The callbacks are called on dispatch and the initial one is called once.
###########################################################################

$event = new Event;

$function_call_order = [];

$event->subscribe(
    new Runnable(
        function ($next) use (&$function_call_order) {
            $function_call_order[] = 1;
            assert($next instanceof Runnable);
            $next->run();
        }
    )
);

$event->subscribe(
    new Runnable(
        function ($next) use (&$function_call_order) {
            $function_call_order[] = 2;
            assert($next instanceof Runnable);
            $next->run();
        }
    )
);

$dispatch_calls = 0;
$event->dispatch(
    new Runnable(
        function () use (&$dispatch_calls) {
            ++$dispatch_calls;
        }
    )
);

assert($function_call_order === [1, 2]);
assert($dispatch_calls === 1);

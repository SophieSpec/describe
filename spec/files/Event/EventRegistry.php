<?php

declare(strict_types=1);

use SophieSpec\Describe\Event\EventRegistry;
use SophieSpec\Describe\Event\EventInterface;
use SophieSpec\Describe\Event\EventNotFoundException;

###########################################################################
# EventRegistry's constructor is private.
###########################################################################

try {
    new EventRegistry;
    assert(false);
} catch (Error $e) {
}

###########################################################################
# Get EventRegistry's singleton instance.
###########################################################################

$eventRegistry = EventRegistry::instance();

###########################################################################
# Verify registered events.
###########################################################################

assert($eventRegistry->describe   instanceof EventInterface);
assert($eventRegistry->it         instanceof EventInterface);
assert($eventRegistry->when       instanceof EventInterface);
assert($eventRegistry->with       instanceof EventInterface);
assert($eventRegistry->assert     instanceof EventInterface);
assert($eventRegistry->success    instanceof EventInterface);
assert($eventRegistry->failed     instanceof EventInterface);
assert($eventRegistry->incomplete instanceof EventInterface);

###########################################################################
# Accessing an unknown event throws an exception.
###########################################################################

try {
    $eventRegistry->foo;
    assert(false);
} catch (EventNotFoundException $e) {
}

<?php

declare(strict_types=1);

namespace Spec\with;

use Exception;
use function SophieSpec\Describe\with;

###########################################################################
# Prepare structs.
###########################################################################

class ExpectedException extends Exception
{
}

###########################################################################
# The message is printed on stdout.
###########################################################################

ob_start();

try {
    with('something', function () {
        throw new ExpectedException;
    });
    assert(false);
} catch (ExpectedException $e) {
}

assert(ob_get_clean() === 'with something');

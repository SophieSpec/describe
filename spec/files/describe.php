<?php

declare(strict_types=1);

namespace Spec\describe;

use function SophieSpec\Describe\describe;
use Exception;

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
    describe('something', function () {
        throw new ExpectedException;
    });
    assert(false);
} catch (ExpectedException $e) {
}

assert(ob_get_clean() === 'describe something');

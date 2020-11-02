<?php

declare(strict_types=1);

namespace Spec\when;

use function SophieSpec\Describe\when;
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
    when('something happens', function () {
        throw new ExpectedException;
    });
    assert(false);
} catch (ExpectedException $e) {
}

assert(ob_get_clean() === 'when something happens');

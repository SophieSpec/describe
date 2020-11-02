<?php

declare(strict_types=1);

namespace Spec\it;

use function SophieSpec\Describe\it;
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
    it('does something', function () {
        throw new ExpectedException;
    });
    assert(false);
} catch (ExpectedException $e) {
}

assert(ob_get_clean() === 'it does something');

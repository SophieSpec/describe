<?php

declare(strict_types=1);

namespace Spec\Runnable\Runnable;

use SophieSpec\Describe\Runnable\Runnable;
use Exception;

###########################################################################
# Prepare structs.
###########################################################################

class ExpectedException extends Exception
{
}

###########################################################################
# The runnable runs the callable.
###########################################################################

try {
    (new Runnable(function () {
        throw new ExpectedException;
    }))->run();
    assert(false);
} catch (ExpectedException $e) {
}

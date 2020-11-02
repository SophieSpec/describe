<?php

declare(strict_types=1);

namespace Spec\Message\Message;

use SophieSpec\Describe\Message\Message;

###########################################################################
# The message is printed on stdout.
###########################################################################

ob_start();

(new Message('message'))->print();

assert(ob_get_clean() === 'message');

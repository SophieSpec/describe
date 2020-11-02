<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Message;

interface MessageInterface
{
    /**
     * Print the message to the output.
     */
    public function print (): void;
}

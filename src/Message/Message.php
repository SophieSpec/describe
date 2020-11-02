<?php

declare(strict_types=1);

namespace SophieSpec\Describe\Message;

final class Message implements MessageInterface
{
    private string $text;

    /**
     * Constructor.
     */
    public function __construct (string $text)
    {
        $this->text = $text;
    }

    /**
     * Print the message to the output.
     */
    public function print (): void
    {
        echo $this->text;
    }
}

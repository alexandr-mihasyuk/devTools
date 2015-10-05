<?php

namespace Exception;

/**
 * Class NotStringArgumentException
 * @package Exception
 */
class NotStringArgumentException extends NotValidArgumentException
{
    /**
     * {@inheritdoc}
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` must be string', $argumentName)
        );
    }
}

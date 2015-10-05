<?php

namespace Exception;

/**
 * Class NotNullOrStringArgumentException
 * @package Exception
 */
class NotNullOrStringArgumentException extends NotValidArgumentException
{
    /**
     * Constructor
     * @param string $argumentName
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` must be string or null', $argumentName)
        );
    }
}

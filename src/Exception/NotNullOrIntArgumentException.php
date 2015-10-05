<?php

namespace Exception;

/**
 * Class NotNullOrIntArgumentException
 * @package Exception
 */
class NotNullOrIntArgumentException extends NotValidArgumentException
{
    /**
     * Constructor
     * @param string $argumentName
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` must be int or null', $argumentName)
        );
    }
}

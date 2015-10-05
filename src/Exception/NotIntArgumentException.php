<?php

namespace Exception;

/**
 * Class NotIntArgumentException
 * @package Exception
 */
class NotIntArgumentException extends NotValidArgumentException
{
    /**
     * @param string $argumentName
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` must be int', $argumentName)
        );
    }
}

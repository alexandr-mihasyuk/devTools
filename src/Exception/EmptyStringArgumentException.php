<?php

namespace Exception;

/**
 * Class EmptyStringArgumentException
 * @package Exception
 */
class EmptyStringArgumentException extends NotValidArgumentException
{
    /**
     * @param string $argumentName
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` must not be empty string', $argumentName)
        );
    }
}

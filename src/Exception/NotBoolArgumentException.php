<?php

namespace Exception;

/**
 * Class NotBoolArgumentException
 * @package Exception
 */
class NotBoolArgumentException extends NotValidArgumentException
{
    /**
     * @param string $argumentName
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` must be bool', $argumentName)
        );
    }
}

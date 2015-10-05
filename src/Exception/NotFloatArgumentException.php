<?php

namespace Exception;

/**
 * Class NotFloatArgumentException
 * @package Exception
 */
class NotFloatArgumentException extends NotValidArgumentException
{
    /**
     * @param string $argumentName
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` must be float', $argumentName)
        );
    }
}

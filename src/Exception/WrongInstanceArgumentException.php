<?php

namespace Exception;

/**
 * Class WrongInstanceArgumentException
 * @package Exception
 */
class WrongInstanceArgumentException extends NotValidArgumentException
{
    /**
     * Constructor
     *
     * @param string $argumentName
     */
    public function __construct($argumentName)
    {
        parent::__construct(
            $argumentName,
            sprintf('Argument `%s` has wrong type', $argumentName)
        );
    }

}
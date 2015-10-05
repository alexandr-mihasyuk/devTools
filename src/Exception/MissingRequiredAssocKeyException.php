<?php

namespace Exception;

/**
 * Class MissingRequiredAssocKeyException
 * @package Exception
 */
class MissingRequiredAssocKeyException extends NotValidArgumentException
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
            sprintf('Key `%s` not set in assoc array', $argumentName)
        );
    }
}

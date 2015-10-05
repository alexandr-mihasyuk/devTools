<?php

namespace Exception;

/**
 * Class InvalidRangeArgumentException
 * @package Exception
 */
class InvalidRangeArgumentException extends NotValidArgumentException
{
    /**
     * @param string $argumentName
     * @param null|int $argumentValue
     */
    public function __construct($argumentName, $argumentValue = null)
    {
        $message = sprintf('Invalid range of argument `%s`', $argumentName);
        if ($argumentValue) {
            $message .= sprintf(' <![CDATA[%s: %s]]>', $argumentName, $argumentValue);
        }
        parent::__construct($argumentName, $message);
    }
}

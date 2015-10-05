<?php

namespace Exception;

/**
 * Class NotValidArgumentException
 * @package Exception
 */
class NotValidArgumentException extends \InvalidArgumentException implements ArgumentExceptionInterface
{
    /**
     * @var string
     */
    private $argumentName;

    /**
     * Constructor
     *
     * @param string $argumentName
     * @param string  $message
     */
    public function __construct($argumentName, $message)
    {
        $this->argumentName = $argumentName;
        parent::__construct($message);
    }

    /**
     * Returns argument name, caused an exception
     *
     * @return string
     */
    public function getArgumentName()
    {
        return $this->argumentName;
    }
}

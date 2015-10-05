<?php

namespace Exception;

/**
 * Interface ArgumentExceptionInterface
 * @package Exception
 */
interface ArgumentExceptionInterface
{
    /**
     * Returns argument name, caused an exception
     *
     * @return string
     */
    public function getArgumentName();
}

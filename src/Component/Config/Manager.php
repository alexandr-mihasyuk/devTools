<?php
/**
 * Created by PhpStorm.
 * User: mihasyuk
 * Date: 05.10.15
 * Time: 22:01
 */

namespace Component\Config;


use Exception\NotStringArgumentException;
use Symfony\Component\Config\FileLocatorInterface;

class Manager
{
    /**
     * @var FileLocatorInterface
     */
    private $fileLocator;

    function __construct(FileLocatorInterface $fileLocator)
    {
        $this->fileLocator = $fileLocator;
    }

    /**
     * @param $configName
     * @return bool
     */
    public function checkConfigExists($configName)
    {
        if (!is_string($configName)) {
            throw new NotStringArgumentException('configName');
        }

        $result = true;
        try {
            $this->fileLocator->locate($configName, null, false);
        } catch (\InvalidArgumentException $e) {
            $result = false;
        }
        return $result;
    }
}
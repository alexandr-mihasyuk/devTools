<?php

namespace Config;

use Symfony\Component\Config\Loader\FileLoader;

class YamlJiraCredentialsLoader extends FileLoader
{
    public function load($resource, $type = null)
    {
        // TODO: Implement load() method.
    }

    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'yml' === pathinfo($resource, PATHINFO_EXTENSION);
    }

}
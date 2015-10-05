<?php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
$ci = new \Symfony\Component\DependencyInjection\ContainerBuilder();
$loader = new \Symfony\Component\DependencyInjection\Loader\YamlFileLoader(
    $container,
    new \Symfony\Component\Config\FileLocator(__DIR__)
);
$loader->load('services.yml');

$application = new Application();

$application->add(new \Command\CreateBranch());
$application->add(new \Command\AppSetup());
$application->run();
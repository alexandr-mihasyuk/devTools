<?php
require __DIR__.'/vendor/autoload.php';

use Command\CreateBranch;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new CreateBranch());
$application->run();
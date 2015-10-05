<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppSetup extends Command
{
    protected function configure()
    {
        $this
            ->setName('AppSetup')
            ->setDescription('Setup application')
            ->addOption('force', 'f', InputOption::VALUE_OPTIONAL,'Force setup. Rewrite configs force')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $force = $input->getOption('force');



        $output->writeln($force);

    }
}
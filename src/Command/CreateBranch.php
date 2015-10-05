<?php

namespace Command;

use Symfony\Component\Console\Command\Command as  SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateBranch extends SymfonyCommand
{
    protected function configure()
    {
        $this
            ->setName('createBranch')
            ->setDescription('Create branch by issue id')
            ->addArgument(
                'issueId',
                InputArgument::REQUIRED,
                'Issue id for branch create'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $issueId = $input->getArgument('issueId');
        if ($issueId) {
            $text = 'issueId: ' . $issueId;
        } else {
            $text = 'no issue id given';
        }

        $output->writeln($text);
    }
}
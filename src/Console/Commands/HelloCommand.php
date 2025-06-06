<?php

namespace Kazuha\Phphelp\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('hello') // <-- AQUI É O QUE RESOLVE!
            ->setDescription('Fala um salve');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Hello dev. Backend. Welcome to my ready-made code framework/library that I use to program my websites from anywhere. Feel free to change the codes and use the codes. The library is open-source and under development.</info>');
        return Command::SUCCESS;
    }
}

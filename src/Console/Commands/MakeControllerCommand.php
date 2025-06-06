<?php

namespace Kazuha\Phphelp\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeControllerCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('make:controller')
            ->setDescription('Cria um novo controller')
            ->addArgument('name', InputArgument::REQUIRED, 'Nome do controller');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $controllerPath = __DIR__ . '/../../../Http/Controllers/' . $name . '.php';

        if (file_exists($controllerPath)) {
            $output->writeln("<error>O controller '$name' já existe, ô mula!</error>");
            return Command::FAILURE;
        }

        $template = <<<PHP
<?php

namespace Kazuha\Phphelp\Http\Controllers;

class $name
{
    public function index()
    {
        // lógica aqui
    }
}
PHP;

        file_put_contents($controllerPath, $template);
        $output->writeln("<info>Controller $name criado com sucesso, chefia.</info>");
        return Command::SUCCESS;
    }
}

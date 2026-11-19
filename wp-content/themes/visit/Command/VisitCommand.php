<?php

namespace VisitMarche\ThemeWp\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use VisitMarche\ThemeWp\Repository\PivotRepository;

// Set up server variables for WordPress multisite CLI context
$_SERVER['HTTP_HOST'] = $_ENV['WP_URL_HOME'];

// Bootstrap WordPress to make WordPress functions available
define('WP_USE_THEMES', false);
require __DIR__.'/../../../../wp-load.php';

#[AsCommand(
    name: 'visit:do',
    description: ' ',
)]
class VisitCommand extends Command
{
    private PivotRepository $pivotRepository;
    private SymfonyStyle $io;

    protected function configure(): void
    {
        $this->setDescription('Do something');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io = new SymfonyStyle($input, $output);

        return Command::SUCCESS;
    }


}

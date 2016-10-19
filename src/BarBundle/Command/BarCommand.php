<?php

namespace BarBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Psr\Log\LoggerInterface;

/**
*   BarCommand class
*   Introduce the bar:hi console command and register it as a member of foo:hello
*   Execution from command line is not allowwed.
*/
class BarCommand extends ContainerAwareCommand
{
    /**
    *   Set up command
    */
    protected function configure()
    {
        // Configuring command name and description
         $this->setName('bar:hi')
              ->setDescription('Adding to the command chain this Bar Command');
    }

    /**
    *   Execute the Bar command.
    * @param $input InputInterface
    * @param $output OutputInterface
    */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = $this->getContainer()->get('logger');

        if ($input->isInteractive()) {
            // Command was run from the console so deny execution
            $output->writeln("Error: bar:hi command is a member of foo:hello command chain and cannot be executed on its own.");
            $logger->info("Error: bar:hi command is a member of foo:hello command chain and cannot be executed on its own.");
        } else {
            // Command was run from the master command
            $output->writeln('Hi From Bar!');
            $logger->info("bar:hi registered as a member of foo:hello command chain");
        }
    }
}

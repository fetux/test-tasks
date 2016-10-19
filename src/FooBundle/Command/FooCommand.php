<?php

namespace FooBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Input\ArrayInput;
use BarBundle\Command\BarCommand;

/**
*   FooCommand class
*   Introduce the foo:hello console command.
*   This command, if there were no other commands registered in its chain, would produce the following output:
*
*   $ php app/console foo:hello
*   Hello from Foo!
*
*/
class FooCommand extends ContainerAwareCommand
{
    /**
    *   Set up command
    */
    protected function configure()
    {
        // Configuring command name and description
         $this->setName('foo:hello')
              ->setDescription('Adding to the command chain this Foo Command.');

    }

    /**
    *   Execute the Foo command.
    * @param $input InputInterface
    * @param $output OutputInterface
    */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        // Set text to display
        $commandTextOutput = 'Hello From Foo!';

        // get PSR Logger
        $logger = $this->getContainer()->get('logger');

        $logger->info("foo:hello is a master command of a command chain that has registered member commands");

        $logger->info("Executing foo:hello command itself first:");

        $logger->info($commandTextOutput);

        // Set console output
        $outputForJob = new ConsoleOutput();

        // Grab bar command from application
        // This is for only one command if we have multiple ones registered we can execute one by one defining
        // a command array
        $command = $this->getApplication()->find('bar:hi');

        // Setup all needed parameters, this to avoid issues of command not found
        $inputForJob = new ArrayInput(array(
            'command' => 'bar:hi',
        ));

        // Set interactive false to allow command execute without user intervention
        $inputForJob->setInteractive(false);

        // Set message into Job output
        $outputForJob->writeln($commandTextOutput);

        $logger->info("Executing foo:hello chain members");

        $returnCode = $this->getApplication()->doRun(
            $inputForJob,
            $outputForJob
        );

        // Check command result
        if (0 == $returnCode) {
            $logger->info("Execution of foo:hello chain completed");
        } else {
            $logger->info("There was an error with code:". $returnCode);
        }
    }
}

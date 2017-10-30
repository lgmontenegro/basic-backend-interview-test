<?php
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Command\NearEarthObjectCommand;

class NearEathObjectCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = static::createKernel();
        $kernel->boot();

        $application = new Application($kernel);
        $application->add(new NearEarthObjectCommand());

        $command = $application->find('app:get-neo');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName()
        ));

        $output = $commandTester->getDisplay();
        $this->assertContains('Empty', $output);
    }
}
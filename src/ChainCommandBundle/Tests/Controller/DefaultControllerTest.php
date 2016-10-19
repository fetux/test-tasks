<?php

namespace ChainCommand\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PHPUnit\Framework\TestCase;
use ChainCommandBundle\Tests\Controller\AbstractCommandTestCase;

class DefaultControllerTest extends AbstractCommandTestCase
{
    public function testAffirmativeFoo()
    {
         $client = self::createClient();
         $output = $this->runCommand($client, "foo:hello");
    }

    public function testNegativeBar()
    {
         $client = self::createClient();
         $output = $this->runCommand($client, "bar:hi");
    }
}

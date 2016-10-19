<?php

namespace ChainCommand\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PHPUnit\Framework\TestCase;
use ChainCommandBundle\Tests\Controller\AbstractCommandTestCase;

/**
 * DefaultControllerTest class to support Functional Command Line Testing
 *
 */
class DefaultControllerTest extends AbstractCommandTestCase
{
    /**
    *   Test Affirmative run foo:hello
    */
    public function testAffirmativeFoo()
    {
         $client = self::createClient();
         $output = $this->runCommand($client, "foo:hello");
    }

    /**
    *   Test Negative run bar:hi
    */
    public function testNegativeBar()
    {
         $client = self::createClient();
         $output = $this->runCommand($client, "bar:hi");
    }
}

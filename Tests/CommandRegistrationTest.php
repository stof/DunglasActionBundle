<?php

/*
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dunglas\ActionBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @author Ener-Getick <egetick@gmail.com>
 */
class CommandRegistrationTest extends KernelTestCase
{
    public function testCommandRegistrationAction()
    {
        static::bootKernel();

        $commandId = 'console.dunglas\actionbundle\tests\fixtures\testbundle\console\foocommand';
        $this->assertTrue(static::$kernel->getContainer()->has($commandId));

        $this->assertContains($commandId, static::$kernel->getContainer()->getParameter('console.command.ids'));

        $this->assertFalse(static::$kernel->getContainer()->has('console.dunglas\actionbundle\tests\fixtures\testbundle\console\bar'));
    }
}

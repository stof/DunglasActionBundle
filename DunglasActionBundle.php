<?php

/*
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dunglas\ActionBundle;

use Dunglas\ActionBundle\DependencyInjection\CompilerPass\RegisterCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
final class DunglasActionBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $passConfig = $container->getCompilerPassConfig();

        $passes = $passConfig->getBeforeOptimizationPasses();

        // This pass must be executed before AddConsoleCommandPass from the FrameworkBundle
        array_unshift($passes, new RegisterCompilerPass());
        $passConfig->setBeforeOptimizationPasses($passes);
    }
}

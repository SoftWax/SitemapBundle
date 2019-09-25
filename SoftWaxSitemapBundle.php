<?php

namespace SoftWax\Bundle\SitemapBundle;

use SoftWax\Bundle\SitemapBundle\DependencyInjection\Compiler\RobotsContentBuilderCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SoftWaxSitemapBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RobotsContentBuilderCompilerPass());
    }
}

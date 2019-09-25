<?php

namespace SoftWax\Bundle\SitemapBundle\DependencyInjection\Compiler;

use SoftWax\Bundle\SitemapBundle\Builder\Robots\RobotsContentBuilderInterface;
use SoftWax\Bundle\SitemapBundle\Builder\Robots\RobotsContentBuilderStack;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class RobotsContentBuilderCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        // If sf >= 3.3, automatically add tag.
        if (method_exists($container, 'registerForAutoconfiguration')) {
            $container
                ->registerForAutoconfiguration(RobotsContentBuilderInterface::class)
                ->addTag('softwax.sitemap.robots_content_builder');
        }

        $buildersStack = $container->getDefinition(RobotsContentBuilderStack::class);
        foreach (array_keys($container->findTaggedServiceIds('softwax.sitemap.robots_content_builder')) as $serviceId) {
            $buildersStack->addMethodCall('addBuilder', [new Reference($serviceId)]);
        }
    }
}

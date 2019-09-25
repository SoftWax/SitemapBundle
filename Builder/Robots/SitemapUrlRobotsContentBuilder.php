<?php

namespace SoftWax\Bundle\SitemapBundle\Builder\Robots;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class SitemapUrlRobotsContentBuilder implements RobotsContentBuilderInterface
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function buildContent(RobotsContentInterface $robotsContent)
    {
        $robotsContent->add(
            sprintf(
                'Sitemap: %s',
                $this->urlGenerator->generate('softwax.sitemap.sitemap', [], UrlGeneratorInterface::ABSOLUTE_URL)
            )
        );
    }
}

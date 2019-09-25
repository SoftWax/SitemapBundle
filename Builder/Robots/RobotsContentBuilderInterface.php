<?php

namespace SoftWax\Bundle\SitemapBundle\Builder\Robots;

interface RobotsContentBuilderInterface
{
    /**
     * @param RobotsContentInterface $robotsContent
     */
    public function buildContent(RobotsContentInterface $robotsContent);
}

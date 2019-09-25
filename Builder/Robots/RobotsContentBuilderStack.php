<?php

namespace SoftWax\Bundle\SitemapBundle\Builder\Robots;

final class RobotsContentBuilderStack
{
    /**
     * @var RobotsContentBuilderInterface[]
     */
    private $robotsContentBuilders = [];

    /**
     * @param RobotsContentBuilderInterface $builder
     */
    public function addBuilder(RobotsContentBuilderInterface $builder)
    {
        if (!in_array($builder, $this->robotsContentBuilders, true)) {
            $this->robotsContentBuilders[] = $builder;
        }
    }

    /**
     * @param RobotsContentInterface $robotsContent
     */
    public function buildContent(RobotsContentInterface $robotsContent)
    {
        foreach ($this->robotsContentBuilders as $contentBuilder) {
            $contentBuilder->buildContent($robotsContent);
        }
    }
}

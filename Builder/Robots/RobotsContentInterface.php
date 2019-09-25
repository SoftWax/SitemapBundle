<?php

namespace SoftWax\Bundle\SitemapBundle\Builder\Robots;

use Symfony\Component\HttpFoundation\Request;

interface RobotsContentInterface
{
    /**
     * @return Request
     */
    public function getRequest(): Request;

    /**
     * @param string $contentLine
     * @return RobotsContentInterface
     */
    public function add(string $contentLine): RobotsContentInterface;

    /**
     * @param string[] $contentLines
     * @return RobotsContentInterface
     */
    public function replace(array $contentLines): RobotsContentInterface;

    /**
     * Builds and returns final robots.txt content.
     *
     * @return string
     */
    public function getContent(): string;
}

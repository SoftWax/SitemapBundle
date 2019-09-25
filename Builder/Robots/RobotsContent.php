<?php

namespace SoftWax\Bundle\SitemapBundle\Builder\Robots;

use Symfony\Component\HttpFoundation\Request;

final class RobotsContent implements RobotsContentInterface
{
    /**
     * @var string[]
     */
    private $contentLines = [];

    /**
     * @var Request
     */
    private $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * {@inheritdoc}
     */
    public function add(string $contentLine): RobotsContentInterface
    {
        $this->contentLines[] = $contentLine;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $contentLines): RobotsContentInterface
    {
        $this->contentLines = [];
        foreach ($contentLines as $contentLine) {
            $this->add($contentLine);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent(): string
    {
        return implode(PHP_EOL, $this->contentLines);
    }
}

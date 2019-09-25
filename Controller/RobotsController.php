<?php

namespace SoftWax\Bundle\SitemapBundle\Controller;

use SoftWax\Bundle\SitemapBundle\Builder\Robots\RobotsContent;
use SoftWax\Bundle\SitemapBundle\Builder\Robots\RobotsContentBuilderStack;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RobotsController
{
    /**
     * @var RobotsContentBuilderStack
     */
    private $robotsContentBuilderStack;

    /**
     * @param RobotsContentBuilderStack $robotsContentBuilderStack
     */
    public function __construct(RobotsContentBuilderStack $robotsContentBuilderStack)
    {
        $this->robotsContentBuilderStack = $robotsContentBuilderStack;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $robotsContent = new RobotsContent($request);
        $this->robotsContentBuilderStack->buildContent($robotsContent);

        // Keep response compatibility with google recommendations:
        // https://developers.google.com/search/reference/robots_txt
        $response = new Response($robotsContent->getContent(), Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/plain');
        $response->setCharset('UTF-8');

        return $response;
    }
}

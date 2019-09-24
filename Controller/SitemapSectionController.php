<?php

namespace SoftWax\Bundle\SitemapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SitemapSectionController
{
    /**
     * @param Request $request
     * @param string $section
     * @param int $page
     * @return Response
     */
    public function __invoke(Request $request, string $section, int $page): Response
    {
        return new Response();
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeedController extends AbstractController
{
    #[Route('/feed', name: 'feed', options: [
        'sitemap',
    ])]
    public function index(): Response
    {
        $rss = simplexml_load_file('https://feeds.feedburner.com/symfony/blog', 'SimpleXMLElement', LIBXML_NOCDATA);

        return $this->render('rss/index.html.twig', [
            'rss' => $rss,
        ]);
    }
}

<?php 


namespace App\Controller;

use App\Service\CallFeedService;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FeedController extends AbstractController
{
    #[Route('/feed', name: 'feed', options: [
        'sitemap'
    ])]
    public function index(): Response
    {
        $rss = simplexml_load_file('https://feeds.feedburner.com/symfony/blog', "SimpleXMLElement", LIBXML_NOCDATA);
// var_dump($rss);
        return $this->render('rss/index.html.twig', [
            'rss' => $rss,
        ]);
    }
}
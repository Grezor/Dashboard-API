<?php
namespace App\Controller;

use App\Service\CallApiDevToService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevToController extends AbstractController
{
    #[Route('/starsdevto', name: 'starsdevto')]
    public function index(Request $request, CallApiDevToService $callApiService, PaginatorInterface $paginator): Response
    {
        $result = $callApiService->getAllReadingList();
        $articles = $paginator->paginate($result, $request->query->getInt('page', 1), 50);
        return $this->render('devto/index.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/feeddevto', name: 'feedDevTo')]
    public function fetchAllFeed(CallApiDevToService $callApiService): Response
    {
        $encoder = new XmlEncoder();
        $callService = $callApiService->getAllData();
        $data = $encoder->decode($callService, 'xml');
        
        return $this->render('devto/feed.html.twig', [
            'feeds' => $data['channel']['item'] ?? null
        ]);
    }

    #[Route('/rssdevto', name: 'rssDevTo')]
    public function fetchAllRss(CallApiDevToService $callApiService): Response
    {
        $encoder = new XmlEncoder();
        $callService = $callApiService->getAllDataRss();
        $data = $encoder->decode($callService, 'xml');
        
        return $this->render('devto/rss.html.twig', [
            'feeds' => $data['channel']['item'] ?? null
        ]);
    }
}
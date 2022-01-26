<?php
namespace App\Controller;

use App\Service\CallSymfonyBlogService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SymfonyBlogController extends AbstractController
{
    #[Route('/symfony', name: 'symfony')]
    public function index(CallSymfonyBlogService $callSymfonyBlogService): Response
    {
        $encoder = new XmlEncoder();
        $callService = $callSymfonyBlogService->getAllData();
        $data = $encoder->decode($callService, 'xml');
        
        return $this->render('symfony/index.html.twig', [
            'feeds' => $data['channel']['item'] ?? null
        ]);
    }
}
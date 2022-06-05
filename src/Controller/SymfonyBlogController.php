<?php
namespace App\Controller;

use App\Service\CallApiSymfonyService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SymfonyBlogController extends AbstractController
{
    #[Route('/blog-symfony', name: 'symfony-blog')]
    public function index(CallApiSymfonyService $callApiSymfonyService): Response
    {
        $encoder = new XmlEncoder();
        $callService = $callApiSymfonyService->getAllDataBlog();
        $data = $encoder->decode($callService, 'xml');
        
        return $this->render('symfony/index.html.twig', [
            'feeds' => $data['channel']['item'] ?? null
        ]);
    }
}
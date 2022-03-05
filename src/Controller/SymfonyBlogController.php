<?php
namespace App\Controller;

use App\Service\CallApiSymfonyServvice;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SymfonyBlogController extends AbstractController
{
    #[Route('/blog-symfony', name: 'symfony-blog')]
    public function index(CallApiSymfonyServvice $callApiSymfonyServvice): Response
    {
        $encoder = new XmlEncoder();
        $callService = $callApiSymfonyServvice->getAllData();
        $data = $encoder->decode($callService, 'xml');
        
        return $this->render('symfony/index.html.twig', [
            'feeds' => $data['channel']['item'] ?? null
        ]);
    }
}
<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    
    #[Route('/home', name: 'home')]
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('home/index.html.twig', [
            'repos' => $callApiService->getData()
        ]);
    }
}

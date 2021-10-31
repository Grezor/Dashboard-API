<?php
namespace App\Controller;

use App\Service\CallApiService;
use App\Service\StarsApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StarController extends AbstractController
{
    #[Route('/stars', name: 'stars')]
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('home/stars.html.twig', [
            'stars' => $callApiService->getAllStars()
        ]);
    }
}
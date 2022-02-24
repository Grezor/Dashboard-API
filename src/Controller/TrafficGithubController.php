<?php
namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrafficGithubController extends AbstractController
{
    #[Route('/traffic', name: 'traffic')]
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('github/traffic.html.twig', [
            'traffic' => $callApiService->getCountTrafficRepository()
        ]);
    }
}
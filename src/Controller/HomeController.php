<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'dashboard')]
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('home/dashboard.html.twig', [
            'reposistory' => $callApiService->getAllRepository(),
            'issues' => $callApiService->getAllIssues()
        ]);
    }
}

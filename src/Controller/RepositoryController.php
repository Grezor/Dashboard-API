<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RepositoryController extends AbstractController
{
    #[Route('/repository', name: 'all_repos_github')]
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('github/repository.html.twig', [
            'repos' => $callApiService->getAllRepository()
        ]);
    }
}
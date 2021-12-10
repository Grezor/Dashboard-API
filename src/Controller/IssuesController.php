<?php
namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IssuesController extends AbstractController
{  

    #[Route('/issues', name: 'issues')]
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('home/issue.html.twig', [
            'issues' => $callApiService->getAllIssues()
        ]);
    }
}


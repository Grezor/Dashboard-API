<?php
namespace App\Controller;

use App\Service\CallApiDevToService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StarsDevToController extends AbstractController
{
    #[Route('/starsdevto', name: 'starsdevto')]
    public function index(CallApiDevToService $callApiService): Response
    {
        return $this->render('devto/index.html.twig', [
            'articles' => $callApiService->getAllReadingList()
        ]);
    }
}
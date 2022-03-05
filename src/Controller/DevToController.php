<?php
namespace App\Controller;

use App\Service\CallApiDevToService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevToController extends AbstractController
{
    #[Route('/starsdevto', name: 'starsdevto')]
    public function index(Request $request, CallApiDevToService $callApiService, PaginatorInterface $paginator): Response
    {
        $result = $callApiService->getAllReadingList();
        $articles = $paginator->paginate($result, $request->query->getInt('page', 1), 50);
        return $this->render('devto/index.html.twig', [
            'articles' => $articles
        ]);
    }
}
<?php
namespace App\Controller;

use App\Service\CallApiGlobal;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HebdooController extends AbstractController
{
    #[Route('/hebdoo', name: 'hebdoo')]
    public function index(CallApiGlobal $callApiGlobal): Response
    {
        return $this->render('hebdoo/index.html.twig', [
            'hedboos' => $callApiGlobal->getApiHebdoo()
        ]);
    }
}
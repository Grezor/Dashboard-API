<?php
namespace App\Controller;

use App\Service\CallApiGithubService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GithubController extends AbstractController
{

    #[Route('/changelog', name: 'changelog_github')]
    public function allChangelog(CallApiGithubService $callApiGithubService): Response
    {
        $encoder = new XmlEncoder();
        $callService = $callApiGithubService->getAllChangelog();
        $data = $encoder->decode($callService, 'xml');
        
        return $this->render('github/changelog.html.twig', [
            'feeds' => $data['channel']['item'] ?? null
        ]);
    }

    #[Route('/issues', name: 'issues_github')]
    public function allIssues(CallApiGithubService $callApiGithubService): Response
    {
        return $this->render('github/issue.html.twig', [
            'issues' => $callApiGithubService->getAllIssues()
        ]);
    }

    #[Route('/stars', name: 'stars_github')]
    public function allStars(CallApiGithubService $callApiGithubService): Response
    {
        return $this->render('github/stars.html.twig', [
            'stars' => $callApiGithubService->getAllStars()
        ]);
    }

    #[Route('/repository', name: 'all_repos_github')]
    public function allRepository(CallApiGithubService $callApiGithubService): Response
    {
        return $this->render('github/repository.html.twig', [
            'repos' => $callApiGithubService->getAllRepository()
        ]);
    }

    #[Route('/traffic', name: 'traffic_github', methods: ['GET'])]
    public function index(CallApiGithubService $callApiGithubService): Response
    {
        return $this->render('github/traffic.html.twig', [
            'traffic' => $callApiGithubService->getCountTrafficRepository()
        ]);
    }
}